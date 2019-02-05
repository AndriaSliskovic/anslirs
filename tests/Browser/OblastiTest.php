<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\Pages\Oblasti;

class OblastiTest extends DuskTestCase
{
    protected $user;
    protected $ruta;
    protected $data;


    public function setUp()
    {
        parent::setUp();
        $this->data['text']='test oblast';
        $this->data['iDOblast']=3;
        $this->ruta='/admin/oblast';
        $this->logingAsAdministrator($this->data);
    }

    //Setovanje usera
    protected function createUser(){
        $this->user=User::find(14);
    }
    //Setovanje admina
    protected function createAdmin(){
        $this->user=User::find(13);
    }

    protected function logingAsAdministrator($data){
        $this->createAdmin();

        $this->browse(function ($user) use ($data) {
            $user->loginAs($this->user)
                //Insanciranje Kategorije page
                ->visit(new Oblasti($data));
        });
    }

    /**
     * @test
     * @group OblastiIndex
     */

    public function kategorije_index(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator();
            $browser->assertUrlIs($this->baseUrl().$this->ruta);
        });
    }

    /**
     * @test
     * @group OblastiOsnovniElementiIndex
     */
    public function osnovni_elementi_index_stranice(){
        $this->data['elementi']=[  'link'=>['Unesi novi zapis'],
            'text'=>['Podaci o oblastima','Naziv oblasti','Knjigovodstvo','Softver']
        ];
        $this->logingAsAdministrator($this->data);
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
//                    ->osnovniElementiStraniceIndex($browser)
                    ->proveraPodatakaIzModela($browser)
            ;
        });
    }


    /**
     * @test
     * @group OblastiCRUD
     */

    public function insert_edit_delete(){
        $this->browse(function (Browser $browser) {
            $browser->assertUrlIs($this->baseUrl().$this->ruta)
                ->unesiZapis($browser)
                ->promeniZapis($browser)
                ->obrisiZapis($browser)
                ;
        });

    }

}
