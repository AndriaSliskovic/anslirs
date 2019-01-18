<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\Podaci;

class Login extends Page
{
    protected $podaci;

    public function __construct()
    {
        $this->data=new Podaci();
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login1';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
        ->assertSee("Ukoliko ste regisrovani korisnik molimo vas da se prijavite");
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@emailPoljeCss' => '.form-group:nth-of-type(1) .form-control',
            '@passPoljeCss'=>'.form-group:nth-of-type(2) .form-control',
            '@registerLink'=>'li:nth-of-type(2) .nav-link',
            '@homePageLink'=>"[href=\'http\:\/\/localhost\:8000\']"


        ];
    }
    public function sendKeys($browser,$podaci=[]){
        $browser->clear('email')
            ->clear('password')
            ->type('@emailPoljeCss', $podaci['email'])
            ->type('@passPoljeCss',$podaci['password']);
    }

    public function validUser(Browser $browser){
        //Ucitavanje validnih podataka
        $validData=$this->data->logValidData();
        $this->sendKeys($browser,$validData);
        $browser->click('@prijaviSe')
            ->on(new AdminPocetna())
            ->assertSee('Admin Panel za sajt :')
        ;
    }

    public function nonAuthUser(Browser $browser){
        $nonAuthUser=$this->data->logNonAuthUser();
        $this->sendKeys($browser,$nonAuthUser);
        $browser->click('@prijaviSe');

    }

    public function invalidUser(Browser $browser){
        $inalidUser=$this->data->logIvalidUser();
        $this->sendKeys($browser,$inalidUser);
        $browser->click('@prijaviSe');

    }

}
