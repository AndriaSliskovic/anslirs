<?php

namespace Tests\Browser;


use Tests\Browser\Components\SrednjiBlogAll;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Components\About;

class NovostiTest extends DuskTestCase
{
    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/vesti')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/vesti')
            ;
        });
    }

    /**
     * @test
     * @group VestiKompAbout
     * @group VestiTest
     */

    public function komponenta_about(){
        $this->data['elementi']=['SLIŠKOVIĆ ANDRIA','direktor ANSLI D.O.O.'];
        $this->data['sectionId']=5;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new About($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group VestiKompSrednjiBlog
     * @group VestiTest
     */
    public function srednji_blog(){
        $this->data['elementi']=['text'=>['Kategorija','Objavio'],
                                'link'=>['Novosti na novom sajtu','Andria','Pročitaj više']
            ];
        $this->data['tipId']=2;
        $this->data['paginacija']=4;
        $this->data['ruta']='vesti';
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new SrednjiBlogAll($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->brojMaxPaginacije($browser)
                    ->testiranjeNavigacijePosta($browser)
                ;
            });

        });
    }





}
