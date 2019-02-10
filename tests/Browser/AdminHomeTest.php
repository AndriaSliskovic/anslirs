<?php

namespace Tests\Browser;

use Tests\Browser\Components\AuthUser;
use Tests\Browser\Components\SideBar;
use Tests\Browser\Pages\AdminPocetna;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\utilities\ElementHelper;

class AdminHomeTest extends DuskTestCase
{
    protected $ruta;
    protected $page;

    public function setUp()
    {
        parent::setUp();
        $this->data['text']='test admin home';
        $this->data['iDOblast']=3;
        $this->ruta='/adminHome';
        $this->data['userId']=13;
        $this->page=AdminPocetna::class;
    }

//    protected function loginAsUser($data=null){
//        $this->createUser($this->data['userId']);
//        $this->browse(function ($user) use ($data) {
//            $user->loginAs($this->user)
//                //Insanciranje Kategorije page
//                ->visit(new AdminPocetna($data));
//        });
//    }
//
//    protected function logingAsAdministrator(){
//        $this->createAdmin($this->data['userId']);
//        $this->browse(function ($user) {
//            $user->loginAs($this->user)
//                ->visit(new AdminPocetna);
//        });
//    }

    /**
     * @test
     * @group AdminHome
     * @group AdminTest
     */

    public function admin_home_elements(){
        $this->logingAsAdministrator($this->data,$this->page);
        $this->browse(function (Browser $browser) {

            $browser->assertUrlIs($this->baseUrl().'/adminHome');

        });
    }

    /**
     * @test
     * @group AdminHomeNavigacija
     * @group AdminTest
     */

    public function navigacija_admin_panela(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator($this->data,$this->page);
            $browser->assertUrlIs($this->baseUrl().'/adminHome')
                ->clickLink('Kategorije')
                ->assertUrlIs($this->baseUrl().'/admin/kategorije')
                ->clickLink('Oblasti')
                ->assertUrlIs($this->baseUrl().'/admin/oblast')
                ->clickLink('Useri')
                ->assertUrlIs($this->baseUrl().'/user')
                ->clickLink('Tipovi')
                ->assertUrlIs($this->baseUrl().'/admin/tipovi')
                ->clickLink('Postovi')
                ->assertUrlIs($this->baseUrl().'/admin/postovi')
                ->clickLink('Menu')
                ->assertUrlIs($this->baseUrl().'/admin/menu')
                ->clickLink('Dokumenti')
                ->assertUrlIs($this->baseUrl().'/admin/dokumenti')
                ->click('@userPolje')
                ->assertSee('View Profile','Logout','Super admin podesavanja')
                ->clickLink('View Profile')
                ->assertUrlIs($this->baseUrl().'/profile/'.$this->user->id)
                ->click('@userPolje')
                ->clickLink('Super admin podesavanja')
                ->assertUrlIs($this->baseUrl().'/admin/settings')
                ->click('@userPolje')
                ->clickLink('Logout')
                ->assertUrlIs($this->baseUrl()."/")
            ;

        });
    }

    /**
     * @test
     * @group AdminHomeNavigacija1
     * @group AdminTest
     */

    public function navigacija_admin_panela_skraceno(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator($this->data,$this->page);
            //Ucitavam prethodno setovane podatke
            $elementi=new ElementHelper();
            $elementi=$elementi->sideBarElements();
            $browser->assertUrlIs($this->baseUrl().'/adminHome');
            //Koristim list metod za elemente definisane u helperu
            foreach ($elementi as list($link,$href)){
                $browser->clickLink($link)
                    ->assertUrlIs($this->baseUrl().$href);
            };

            ;

        });
    }

    /**
     * @test
     * @group PristupanjeKomponentiUser
     * @group AdminTest
     */
    public function provera_komponente_AuthUser(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator($this->data,$this->page);
            $browser->assertUrlIs($this->baseUrl().'/adminHome')
                    //Pristupanje komponenti AuthUser
                    ->within(new AuthUser(),function (Browser $browser){
                        // !! Setujem novi properti za browser sa id trenutnog usera
                        $browser->idUsera=$this->user->id;
                        $browser->selectAuthUser($browser)
                                ->clickOnViewProfile($browser)
                                ->back()
                            ->assertUrlIs($this->baseUrl().'/adminHome')
                            ->selectAuthUser($browser)
                            ->clickOnSuperAdminPodesavanja($browser)
                        ;
                })

            ;
        });
    }

    /**
     * @test
     * @group NijeAdmin
     * @group AdminTest
     */

    //Oblasti koje nisu dozvoljene useru koji nije admin
    public function nije_admin(){
        $this->data['userId']=14;
        $this->loginAsUser($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
            ->navNijeAdmin($browser);
            ;
            $browser->assertUrlIs($this->baseUrl().$this->ruta);

        });
    }


}
