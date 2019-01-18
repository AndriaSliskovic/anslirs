<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Settings;
use App\Menu;

class Header extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '.header';
    }

    /**
     * Assert that the browser page contains the component.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertVisible($this->selector());
    }

    /**
     * Get the element shortcuts for the component.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@telefon' => '.callto li:nth-of-type(1) span',
            '@email'=>'.callto li:nth-of-type(2) span'
        ];
    }

    public function headerOsnovniElementi($browser){
        $settings=Settings::first();
        //Tacno pozicionirani elementi
        $browser->assertSeeIn('@telefon', $settings->telefon)
            ->assertSeeIn('@email', $settings->email)
        ;

    }


}
