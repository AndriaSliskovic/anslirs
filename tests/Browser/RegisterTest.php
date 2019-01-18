<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Register;

class RegisterTest extends DuskTestCase
{
    public function registerUser($browser){
        $browser->visit(new Login)
                ->assertUrlIs($this->baseUrl().'/login1')
                ->click('@registerLink')
                ->on(new Register())
                ->assertUrlIs($this->baseUrl().'/register1')
                ->assertSee('Formular za registraciju');
            }
    /**
     * @test
     * @group registerValidUser
     */
    //Registracija usera ide preko login stranice
    public function register_valid_user(){
        $this->browse(function (Browser $browser) {
            //Otvaranje strane za logovanje i koristi njen metod
            $this->registerUser($browser);
            $browser
                ->regValidUser()
                ->assertUrlIs($this->baseUrl().'/adminHome')
                ->assertSee('Ansli D.O.O.');

        });
    }

    /**
     * @test
     * @group registerExistingUser
     */
    //Registracija direktno preko url-a
    public function register_existing_user(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register())
                ->assertUrlIs($this->baseUrl().'/register1')
                ->regExistingUser()
                ->assertUrlIs($this->baseUrl().'/register1')
                ->assertSee('The email has already been taken');
        });
    }

    /**
     * @test
     * @group registerInvalidUser
     */
    public function register_invalid_user(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new Register())
                ->assertUrlIs($this->baseUrl().'/register1')
                ->regExistingUser()
                //Registracija nije uspela vraca na Register stranicu
                ->assertUrlIs($this->baseUrl().'/register1');
        });
    }


}
