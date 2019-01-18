<?php

namespace Tests\Browser;

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
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest extends DuskTestCase
{

    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/')
            ;
        });
    }

    //----- LAYOUT KOMPONENTE -----//

    /**
     * @test
     * @group HomeOsnovniElementHomePage
     */

    public function testiranje_osnovnih_elemenata_stranice(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser
                ->assertSee('Softver')
            ;

        });
    }

    /**
     * @test
     * @group HomeTestiranjeHedera
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
     * @group HomeTestiranjeGlavnogMenija
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
     * @group HomeTestiranjeFootera
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

    /**
     * @test
     * @group HomeTestiranjeGlavneNavigacije
     */

    public function testiranje_glavne_navigacije(){
        $this->loadPage();

        $this->browse(function (Browser $browser) {
//            Ceka da se komponenta ucita
            $browser->whenAvailable(new MenuComponent(), function ($menu) {
                $menu
                    ->navMainMenu($menu)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeTestiranjeDonjeNavigacije
     */

    public function testiranje_donje_navigacije(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
//            Ceka da se komponenta ucita
            $browser->whenAvailable(new Footer(), function ($menu) {
                //Isti je metod kao u prethodnom samo je druga komponenta
                $menu
                    ->navMainMenu($menu)
                ;
            });

        });
    }

    //----- TESTIRANJE KOMPONENTI HOME PAGE-----//

    /**
     * @test
     * @group HomeKompKnjigovodstveneUsluge
     */

    public function komponenta_knjigovodsvene_usluge(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
//            Ceka da se komponenta ucita
            $browser->whenAvailable(new KnjigUsluge(), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->testiranjeNavigacije($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeKompSoftverskeUsluge
     */

    public function komponenta_softverske_usluge(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new KnjigUsluge(), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->testiranjeNavigacije($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeKompKaruselVeliki
     */

    public function komponenta_carusel_veliki(){

        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=1;
            $osnovniElementi=['ANSLI D.O.O.','Knjigovodstvo','Softver'];
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
     * @group HomeKompOpstiDeo
     */

    public function komponenta_opsti_deo(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new OpstiDeo(), function ($browser) {
                $browser
//                    ->osnovniElementiKomponente($browser)
//                    ->testiranjeNavigacije($browser)
                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeVelikiBlog
     */

    public function komponenta_veliki_blog(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $oblastId=3;
            $paginacija=3;
            $osnovniElementi=['Osnovana kompanije ','Knjigovodsvene usluge','Kategorija','Objavio :'];
            $browser->whenAvailable(new VelikiBlog(), function ($browser) use ($osnovniElementi,$oblastId,$paginacija) {
                $browser->osnovniElementi=$osnovniElementi;
                $browser->oblastId=$oblastId;
                $browser->paginacija=$paginacija;
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->testiranjeNavigacijePosta($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeKompAbout
     */

    public function komponenta_about(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $sectionId=5;
            $osnovniElementi=['SLIŠKOVIĆ ANDRIA','direktor'];
            $browser->whenAvailable(new About(), function ($browser) use($sectionId,$osnovniElementi) {
                $browser->sectionId=$sectionId;
                $browser->osnovniElementi=$osnovniElementi;
                $browser
                    ->osnovniElementiKomponente($browser)
//                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group HomeKompKategorije
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

    /**
     * @test
     * @group HomeKompMaliBlog
     */

    public function komponenta_mali_blog(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $skill=5;
            $paginacija=4;
            $osnovniElementi=['Nova verzija','Opis programa'];
            $browser->whenAvailable(new MaliBlog(), function ($browser) use ($skill,$paginacija,$osnovniElementi){
                $browser->skill=$skill;
                $browser->paginacija=$paginacija;
                $browser->osnovniElementi=$osnovniElementi;
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                    ->testiranjeNavigacijeKategorija($browser)
                    ->brojMaxPaginacije($browser)
                ;
            });

        });
    }
}
