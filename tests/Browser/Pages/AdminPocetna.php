<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class AdminPocetna extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/adminHome';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }

    public function navNijeAdmin(Browser $browser){
        $messageError='Nemate ovlascenje da pristupite ovoj stranici';
        $browser->clickLink('Kategorije');
        $this->toastrMessage($browser,$messageError);
        $browser->clickLink('Oblasti');
        $this->toastrMessage($browser,$messageError);
        $browser->clickLink('Tipovi');
        $this->toastrMessage($browser,$messageError);
        $browser->clickLink('Postovi');
        $this->toastrMessage($browser,$messageError);
        $browser->clickLink('Menu');
        $this->toastrMessage($browser,$messageError);
        $browser->clickLink('Dokumenti');
        $this->toastrMessage($browser,$messageError);
    }


}
