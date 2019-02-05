<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Components\About;
use Tests\Browser\Components\CaruselVeliki;
use Tests\Browser\Components\Footer;
use Tests\Browser\Components\Header;
use Tests\Browser\Components\Kategorije;
use Tests\Browser\Components\MenuComponent;
use Tests\Browser\Components\SrednjiBlog;
use Tests\Browser\Components\Proizvodix2;

class SoftverTest extends DuskTestCase
{
    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/softver')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/softver')
            ;
        });
    }

    //----- LAYOUT KOMPONENTE -----//

    /**
     * @test
     * @group AgenOsnovniElementHomePage
     * @group SoftverTest
     */

    public function testiranje_osnovnih_elemenata_stranice(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSee('POČETNA')
            ;

        });
    }

    /**
     * @test
     * @group SoftTestiranjeHedera
     * @group SoftverTest
     */

    public function testiranje_hedera_Home_page(){
        $this->loadPage();
        //Testiranje komponente header
        $this->browse(function (Browser $browser) {
            //Ceka da se komponenta ucita
            $browser->whenAvailable(new Header(), function ($header) {
                $header
                    ->headerOsnovniElementi($header)
                ;
            });

        });
    }

    /**
     * @test
     * @group SoftTestiranjeGlavnogMenija
     * @group SoftverTest
     */

    public function test_glavnog_menija(){
        $this->loadPage();
        //Testiranje komponente menu
        $this->browse(function (Browser $browser) {
            //Ceka da se komponenta ucita
            $browser->whenAvailable(new MenuComponent(), function ($menu) {
                $menu
                    ->headerMenu($menu)
                    ->navMainMenu($menu)
                ;
            });

        });
    }

    /**
     * @test
     * @group SoftTestiranjeFootera
     * @group SoftverTest
     */
    public function test_footera(){
        $this->loadPage();
        //Testiranje komponente footer
        $this->browse(function (Browser $browser) {
            //Ceka da se komponenta ucita
            $browser->whenAvailable(new Footer(), function ($footer) {
                $footer
                    ->osnovniElementiFootera($footer)
                    ->footerMenu($footer)
                    ->navFooterMenu($footer)
                ;
            });

        });
    }

    //----- TESTIRANJE KOMPONENTI STRANICE Softver -----//

    /**
     * @test
     * @group SoftKompKaruselVeliki
     * @group SoftverTest
     */

    public function komponenta_carusel_veliki(){
        $this->data['elementi']=['Knjigovodsveni softver','WEB SAJTOVI','Softver za pravna lica'];
        $this->data['sectionId']=8;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new CaruselVeliki($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    //Nema navigaciju
                ;
            });

        });
    }

    /**
     * @test
     * @group SoftKompAbout
     * @group SoftverTest
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
     * @group SoftKompKategorije
     * @group SoftverTest
     */

    public function komponenta_kategorije(){
        $this->data['elementi']=['KATEGORIJE'];
        $this->data['ruta']='softver';
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new Kategorije($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->testiranjeNavigacijeKategorija($browser)
                ;
            });

        });
    }

    // !!! Kategorije i maliBlog su vec testirani u Home pageu !!!


    /**
     * @test
     * @group SoftSrednjiBlog
     * @group SoftverTest
     */
    public function kommponenta_srednji_blog(){
        $this->data['elementi']=['link'=>['Novosti na novom sajtu.','Objavio Andria'],
                                'text'=>['Softver obavestenje','Kategorija']
                                ];
        $this->data['oblastId']=2;
        $this->data['paginacija']=4;
        $this->data['ruta']='softver';
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new SrednjiBlog($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->testiranjeNavigacijePosta($browser)
                    ->brojMaxPaginacije($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group SoftProizvodi2x2
     * @group SoftverTest
     */
    public function kommponenta_proizvodi_2x2(){
        $this->data['elementi']=['Programski paket','Program za agencije','BAKERY','prodaje, prometa'];
        $this->data['secId']=9;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new Proizvodix2($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }
}
