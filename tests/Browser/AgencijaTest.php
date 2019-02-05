<?php

namespace Tests\Browser;

use Tests\Browser\Components\Proizvodix2;
use Tests\Browser\Components\SrednjiBlog;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Components\About;
use Tests\Browser\Components\CaruselVeliki;
use Tests\Browser\Components\Footer;
use Tests\Browser\Components\Header;
use Tests\Browser\Components\Kategorije;
use Tests\Browser\Components\MenuComponent;


class AgencijaTest extends DuskTestCase
{
    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/agencija')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/agencija')
            ;
        });
    }

    //----- LAYOUT KOMPONENTE -----//

    /**
     * @test
     * @group AgenOsnovniElementHomePage
     * @group AgencijaTest
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
     * @group AgenTestiranjeHedera
     * @group AgencijaTest
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
     * @group AgenTestiranjeGlavnogMenija
     * @group AgencijaTest
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
     * @group AgenTestiranjeFootera
     * @group AgencijaTest
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

    //----- TESTIRANJE KOMPONENTI STRANICE AGENCIJA -----//

    /**
     * @test
     * @group AgenKompKaruselVeliki
     * @group AgencijaTest
     */

    public function komponenta_carusel_veliki(){
        $this->data['elementi']=['Kompletna knjigovodstvena usluga','Praćenje propisa','Izrada završnih računa'];
        $this->data['sectionId']=6;
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
     * @group AgenKompAbout
     * @group AgencijaTest
     */

    public function komponenta_about(){
        $this->data['elementi']=['SLIŠKOVIĆ JELENA','Šef knjigovodstva'];
        $this->data['sectionId']=10;
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
     * @group AgenKompKategorije
     * @group AgencijaTest
     */

    public function komponenta_kategorije(){
        $this->data['elementi']=['KATEGORIJE'];
        $this->data['ruta']='agencija';
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
     * @group AgenSrednjiBlog
     * @group AgencijaTest
     */
    public function kommponenta_srednji_blog(){
        $this->data['elementi']=[  'link'=>['Predaja završnih računa ','Objavio'],
                                'text'=>['Agencija obaveštenje','Kategorija']
                                ];
        $this->data['oblastId']=1;
        $this->data['paginacija']=4;
        $this->data['ruta']='agencija';

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
     * @group AgenProizvodi2x2
     * @group AgencijaTest
     */
    public function kommponenta_proizvodi_2x2(){
        $this->data['elementi']=['PREDUZETNICI','Vođenje poslovnih knjiga','PRAVNA LICA','pravnim licima'];
        $this->data['secId']=7;
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
