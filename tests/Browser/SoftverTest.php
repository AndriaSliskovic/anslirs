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

        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=8;
            $osnovniElementi=['Knjigovodsveni softver','WEB SAJTOVI','Softver za pravna lica'];
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
     * @group SoftKompAbout
     * @group SoftverTest
     */

    public function komponenta_about(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=10;
            $osnovniElementi=['SLIŠKOVIĆ ANDRIA','direktor ANSLI D.O.O.'];
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
     * @group SoftKompKategorije
     * @group SoftverTest
     */

    public function komponenta_kategorije(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $osnovniElementi=['KATEGORIJE'];
            $browser->whenAvailable(new Kategorije(), function ($browser) use($osnovniElementi) {
                $browser->osnovniElementi=$osnovniElementi;
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
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $oblastId=2;
            $paginacija=4;
            $osnovniElementi=[  'link'=>['Novosti na novom sajtu.','Objavio Andria'],
                'text'=>['Softver obavestenje','Kategorija']
            ];
            $ruta='softver';
            $browser->whenAvailable(new SrednjiBlog(), function ($browser) use ($osnovniElementi,$oblastId,$paginacija,$ruta) {
                $browser->osnovniElementi=$osnovniElementi;
                $browser->oblastId=$oblastId;
                $browser->paginacija=$paginacija;
                $browser->ruta=$ruta;
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->testiranjeNavigacijePosta($browser)
                    ->brojMaxPaginacije($browser)
                ;
            });

        });
    }
}
