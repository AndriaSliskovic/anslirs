<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Page;
use Tests\Browser\Pages\PostPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PostTest extends DuskTestCase
{
    protected $ruta;
    protected $page;

    public function setUp()
    {
        parent::setUp();
        $this->data['text']='test post';
        $this->ruta='/admin/postovi';
        $this->data['userId']=13;
        $this->page=PostPage::class;
    }

    /**
     * @test
     * @group PostIndex
     * @group PostTest
     */

    public function post_index(){
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta);
        });
    }

    /**
     * @test
     * @group PostOsnovniElementiIndex
     * @group PostTest
     */

    public function osnovni_elementi_index_stranice(){
        $this->data['elementi']=[  'link'=>['Unesi novi zapis'],
            'text'=>['Slika','Naslov','Kategorija']
        ];
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
                ->osnovniElementiStraniceIndex($browser)
                ->proveraPodatakaIzModela($browser)
            ;
        });
    }

    /**
     * @test
     * @group PostCRUD
     * @group PostTest
     */

    public function insert_edit_delete(){
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
                ->unesiZapis($browser)
                ->promeniZapis($browser)
                ->obrisiZapis($browser)
            ;
        });
    }


}
