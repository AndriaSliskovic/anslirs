<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Kategorije;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\Pages\Oblasti;

class KategorijeTest extends DuskTestCase
{
    protected $ruta;
    protected $page;


    public function setUp()
    {
        parent::setUp();
        $this->data['text']='test kategorija';
        $this->data['iDOblast']=3;
        $this->ruta='/admin/kategorije';
        $this->data['userId']=13;
        $this->page=Kategorije::class;
    }
    /**
     * @test
     * @group KategorijeIndex
     * @group KategorijeTest
     */

    public function kategorije_index(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator($this->page,$this->data);
            $browser->assertUrlIs($this->baseUrl().$this->ruta);
        });
    }

    /**
     * @test
     * @group KategorijeOsnovniElementiIndex
     * @group KategorijeTest
     */
    public function osnovni_elementi_index_stranice(){
        $this->data['elementi']=[  'link'=>['Unesi novi zapis'],
            'text'=>['Podaci o kategorijama','Naziv kategorije','Oblast','Novi propisi']
        ];
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
                    ->osnovniElementiStraniceIndex($browser)
                    ->proveraPodatakaIzModela($browser);
        });
    }


    /**
     * @test
     * @group KategorijeCRUD
     * @group KategorijeTest
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
