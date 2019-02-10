<?php

namespace Tests\Browser;

use Tests\DuskTestCase as DuskTestCase;
//use BeyondCode\DuskDashboard\Testing\TestCase as DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\Pages\Oblasti;

class OblastiTest extends DuskTestCase
{
    protected $ruta;
    protected $page;

    public function setUp()
    {
        parent::setUp();
        $this->data['text']='test oblast';
        $this->data['iDOblast']=3;
        $this->ruta='/admin/oblast';
        $this->data['userId']=13;
        $this->page=Oblasti::class;
    }

    /**
     * @test
     * @group OblastiIndex
     * @group OblastTest
     */

    public function kategorije_index(){
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta);
        });
    }

    /**
     * @test
     * @group OblastiOsnovniElementiIndex
     * @group OblastTest
     */
    public function osnovni_elementi_index_stranice(){
        $this->data['elementi']=[  'link'=>['Unesi novi zapis'],
            'text'=>['Podaci o oblastima','Naziv oblasti','Knjigovodstvo','Softver']
        ];
        $this->logingAsAdministrator($this->page,$this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
                    ->osnovniElementiStraniceIndex($browser)
//                    ->proveraPodatakaIzModela($browser)
            ;
        });
    }


    /**
     * @test
     * @group OblastiCRUD
     * @group OblastTest
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
