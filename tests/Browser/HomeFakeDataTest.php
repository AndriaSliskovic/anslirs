<?php

namespace Tests\Browser;

use App\Category;
use App\Menu;
use App\Oblast;
use App\Post;
use App\Section;
use App\Settings;
use App\User;
use Hamcrest\Thingy;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\Browser\Components\SoftvUsluge;
use Tests\Browser\Components\VelikiBlog;

class HomeFakeDataTest extends DuskTestCase
{
//    use DatabaseMigrations;
//    use DatabaseTransactions;
//    use RefreshDatabase;
    protected $data;

    public function setUp()
    {
        // Ne koristi se setUp u nadredjenoj klasi zato sto se samo ovde vrsi testiranje sa fake podacima
        parent::setUp();
        $this->data['settings']=factory(Settings::class)->create();
        $this->data['menu']=factory(Menu::class,6)->create();
        $this->data['section']=factory(Section::class,15)->create();
        $this->data['category']=factory(Category::class,4)->create();
        $this->data['user']=factory(User::class)->create();
    }

    public function createData(){

        $this->data['category']=factory(Category::class)->create(['oblast_id'=>3]);
        $this->data['vazniPostovi']=factory(Post::class,20)->create(['skill'=>5]);
        $this->data['direktor']=factory(Section::class)->create(['sec_id'=>5]);
        return $this->data;
    }

    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/')
            ;
        });
    }

    /**
     * @test
     * @group HomeFakeOsnovniElementHomePage
     */

    public function testiranje_osnovnih_elemenata_stranice(){

        $data=$this->createData();
//        dd($data['menu']->count());
        dd(Oblast::find(3)->posts()->count());
        $this->loadPage();
        $this->browse(function (Browser $browser) use ($data) {
            $browser
                ->assertTitle($data['settings']->title)
            ;

        });
    }

    /**
     * @test
     * @group HomeFakeSoftver
     */
    public function sekcija_softver(){
        $data=$this->createData();
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            //Pustanje podataka $data kroz konstruktor
            $browser->whenAvailable(new SoftvUsluge($this->data), function ($browser) {
                $browser
                    ->proveraPodatakaIzModela($browser)
//                    ->testiranjeNavigacije($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeFakeVelikiBlog
     */

    public function komponenta_veliki_blog(){
        //Bira sa kategorija samo za veliki blog
        $category=$this->data['category']->where('oblast_id',3)->first();
        //Prave se postovi samo za datu kategoriju za oblast 3
        $this->data['opstiPost']=factory(Post::class,7)->create(['category_id'=>$category->id]);
        $this->loadPage();
        $postovi=$this->data['opstiPost'];
        $this->browse(function (Browser $browser) use($postovi) {
            $browser->whenAvailable(new VelikiBlog($postovi), function ($browser) {
                $browser
                    ->modelFakePodaci($browser)
                ;
            });

        });
    }

}
