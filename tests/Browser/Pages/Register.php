<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\Podaci;

class Register extends Page
{
    protected $data;

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
        return '/register1';
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
        ->assertSee('Formular za registraciju');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@ime' => 'name',
            '@email'=>'email',
            '@pass'=>'password',
            '@repass'=>'password_confirmation',
            '@submit'=>'.btn-primary'
        ];
    }

    public function sendKeys($browser,$podaci=[]){
        $browser->type('@ime',$podaci['ime'])
            ->type('@email', $podaci['email'])
            ->type('@pass',$podaci['password'])
            ->type('@repass',$podaci['password'])
        ;
    }

    public function regValidUser(Browser $browser){
        //Ucitavanje validnih podataka
        $validData=$this->data->regValidUser();
//        dd($validData);
        $this->sendKeys($browser,$validData);
        $browser->click('@submit')
            ->on(new AdminPocetna())
            ->assertSee('Admin Panel za sajt :')
        ;
    }

    public function regExistingUser(Browser $browser){
        $existingUser=$this->data->regValidUser();
        $this->sendKeys($browser,$existingUser);
        $browser->click('@submit');

    }

    public function regInvalidUser(Browser $browser){
        $inalidUser=$this->data->regInvalidUser();
        $this->sendKeys($browser,$inalidUser);
        $browser->click('@prijaviSe');

    }
}
