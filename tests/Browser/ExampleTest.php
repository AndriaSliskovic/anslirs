<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Login;

class ExampleTest extends DuskTestCase
{
    /**
     * @test
     * @group prvi
     */
    public function BasicExample()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitForLink('O nama',10)
                    ->assertSeeLink('Procitaj vise')
                ->assertSeeLink('Agencija Knjigovodsvto')


            ;
//            $text = $browser->text('#testLogin');
//            $browser->assertSee($text);
//            $browser->assertSeeLink('Login');

//            $browser->clickLink('Documentation');
//            $browser->click('@login-button');
        });
    }

    /**
     * @test
     * @group logovanjeUsera
     */
    public function logovanjeUsera(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/login1')
                ->pause(2000)
                ->waitForLink('Zaboravljena lozinka?',3)
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
                ->clear('email')
                ->clear('password')
                ->type('email', 'admin@mail.com')
                ->type('password','1Qwert')
                ->click('@prijaviSe')
                ->assertSee('Ansli D.O.O.')


            ;
        });

    }

    /**
     * @test
     * @group logovanjeUsera
     */

    public function adminPocetna(){


        $this->browse(function (Browser $browser) {
            $browser->assertSee('Admin Panel za sajt :')
                    ->assertSeeLink("Oblasti")
                    ->assertSee("Admin")
                    ->assertSee("Ansli D.O.O.")


            ;
        });
    }

    /**
     * @test
     * @group logovanjeUsera2
     */
    public function logovanjeUseraPrekoPagea(){
        //Otvaranje strane za logovanje
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login)
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
            ;
        //Pozivanje metoda za ubacivanje validnih podataka
        $this->slanjeValidnihPodataka();
        });
        //Provera da li je dobijena ocekivana stranica
        $this->browse(function (Browser $browser) {
            $browser->assertSee('Ansli D.O.O.');
        });
    }

    public function slanjeValidnihPodataka(){
        $this->browse(function (Browser $browser) {
            $browser->clear('email')
                ->clear('password')
                ->type('email', 'admin@mail.com')
                ->type('password','1Qwert')
                ->click('@prijaviSe')
            ;
        });
    }


}
