<?php

namespace Tests\Browser;

use Tests\Browser\Components\About;
use Tests\Browser\Components\CaruselVeliki;
use Tests\Browser\Components\Footer;
use Tests\Browser\Components\Header;
use Tests\Browser\Components\Kategorije;
use Tests\Browser\Components\KnjigUsluge;
use Tests\Browser\Components\MaliBlog;
use Tests\Browser\Components\MenuComponent;
use Tests\Browser\Components\OpstiDeo;
use Tests\Browser\Components\SoftvUsluge;
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
            $browser->whenAvailable(new SoftvUsluge(), function ($browser) {
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
        $this->data['elementi']=['ANSLI D.O.O.','Knjigovodstvo','Softver'];
        $this->data['sectionId']=1;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new CaruselVeliki($this->data), function ($browser) {
                $browser
//                    ->osnovniElementiKomponente($browser)
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
        $this->data['elementi']=
            [
            'text'=>['Kompanija koja se bavi knjigovodstvenim uslugama i izradom softvera za knjigovodstvene agencije.'],
            'link'=>['O nama']
            ];
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new OpstiDeo($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->testiranjeNavigacije($browser)
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
        $this->data['elementi']=['text'=>['Osnovana kompanije ','Knjigovodsvene usluge','Kategorija','Objavio :']];
        $this->data['oblastId']=3;
        $this->data['paginacija']=3;
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new VelikiBlog($this->data), function ($browser) {
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
            $this->data['sectionId']=5;
            $this->data['elementi']=['SLIŠKOVIĆ ANDRIA','direktor'];
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
     * @group HomeKompKategorije
     */

    public function komponenta_kategorije(){
        $this->data['elementi']=['KATEGORIJE'];
        $this->data['ruta']='home';
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

    /**
     * @test
     * @group HomeKompMaliBlog
     */

    public function komponenta_mali_blog(){
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $this->data['skill']=5;
            $this->data['paginacija']=3;
            $this->data['elementi']=['link'=>['Nova verzija','Opis programa']];
            $browser->whenAvailable(new MaliBlog($this->data), function ($browser){
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
