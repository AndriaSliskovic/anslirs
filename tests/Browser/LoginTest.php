<?php

namespace Tests\Browser;

use Hamcrest\Thingy;
use Tests\Browser\Pages\HomePage;
use Tests\Browser\Pages\Register;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Login;
use Session;

class LoginTest extends DuskTestCase
{
    /**
     * @test
     * @group loginAuthUser
     */
    public function logovanjeAuthUsera(){
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(3))
                ->visit('/adminHome');
        });
    }

    /**
     * @test
     * @group loginUser
     */
    public function login_valid_user(){
        //Otvaranje strane za logovanje i koristi njen metod
        $this->browse(function (Browser $browser) {
            //Instanciranje Login page
            $browser->visit(new Login)
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
                ->validUser()
                ->assertUrlIs($this->baseUrl().'/adminHome')
                ->assertSee('Ansli D.O.O.');
            ;
        });
    }

    /**
     * @test
     * @group loginNonAuthUser
     */
    public function login_no_auth_user(){
        $this->browse(function (Browser $browser) {
            $greska='These credentials';
            //Instanciranje Login page
            $browser->visit(new Login)
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
                ->nonAuthUser()
                //Hvata gresku
                ->assertSee($greska)
                //Proverava da li vraca na login stranu
                ->assertUrlIs($this->baseUrl().'/login1')
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
            ;
        });
    }

    /**
     * @test
     * @group loginIvalidUser
     */
    public function login_invalid_user(){
        $this->browse(function (Browser $browser) {
            $greska='These credentials';
            //Instanciranje Login page
            $browser->visit(new Login)
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
                ->invalidUser()
                //Hvata gresku
                ->assertSee($greska)
                //Proverava da li vraca na login stranu
                ->assertUrlIs($this->baseUrl().'/login1')
                ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite")
            ;
        });
    }

    /**
     * @test
     * @group loginNavToRegisteUser
     */
    public function nav_to_register_page(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login())
                ->click('@registerLink')
                ->on(new Register())
                ->assertSee('Formular za registraciju')

            ;
        });
    }

    /**
     * @test
     * @group loginNavToHomePage
     */

    public function nav_to_HomePage(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login())
                ->assertSeeLink('Logo')
                ->clickLink('Logo')
                ->on(new HomePage())
                ->pause(5000)
                ->assertSeeLink('Procitaj vise')
                ->assertSeeLink('Agencija Knjigovodsvto')
            ;
        });
    }

}
