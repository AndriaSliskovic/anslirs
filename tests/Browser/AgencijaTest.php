<?php

namespace Tests\Browser;

use Tests\Browser\Components\SrednjiBlog;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Components\About;
use Tests\Browser\Components\CaruselVeliki;
use Tests\Browser\Components\Footer;
use Tests\Browser\Components\Header;
use Tests\Browser\Components\Kategorije;
use Tests\Browser\Components\KnjigUsluge;
use Tests\Browser\Components\MaliBlog;
use Tests\Browser\Components\Menu;
use Tests\Browser\Components\MenuComponent;
use Tests\Browser\Components\OpstiDeo;
use Tests\Browser\Components\VelikiBlog;

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

        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=6;
            $osnovniElementi=['Kompletna knjigovodstvena usluga','Praćenje propisa','Izrada završnih računa'];
//  !!! NACIN PUSTANJA DODATNOG PARAMETRA KROZ CLOUSURE FUNKCIJU !!!
            $browser->whenAvailable(new CaruselVeliki(), function ($browser) use ($sectionId,$osnovniElementi) {
//  !!! SVE MORA DA SE SETUJE U OBJEKAT BROWSER ZBOG CLOUSURE FUNKCIJE  !!!
                $browser->sectionId=$sectionId;
                $browser->osnovniElementi=$osnovniElementi;
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
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=10;
            $osnovniElementi=['SLIŠKOVIĆ JELENA','Šef knjigovodstva'];
            $browser->whenAvailable(new About(), function ($browser) use($sectionId,$osnovniElementi) {
                $browser->sectionId=$sectionId;
                $browser->osnovniElementi=$osnovniElementi;
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
        $this->loadPage();
        $this->browse(function (Browser $browser) {

            $browser->whenAvailable(new Kategorije(), function ($browser) {
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
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $oblastId=1;
            $paginacija=4;
            $osnovniElementi=['Predaja završnih računa ','Agencija obaveštenje','Kategorija','Objavio'];
            $browser->whenAvailable(new SrednjiBlog(), function ($browser) use ($osnovniElementi,$oblastId,$paginacija) {
                $browser->osnovniElementi=$osnovniElementi;
                $browser->oblastId=$oblastId;
                $browser->paginacija=$paginacija;
                $browser
//                    ->osnovniElementiKomponente($browser)
//                    ->proveraPodatakaIzModela($browser)
//                    ->testiranjeNavigacijePosta($browser)
                    ->brojMaxPaginacije($browser)
                ;
            });

        });
    }
}
