<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class KnjigUsluge extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '@knjigUsluge';
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
            '@element' => '#selector',
        ];
    }


    public function osnovniElementiKomponente(Browser $browser){
        $browser->assertSeeLink('Agencija Knjigovodsvto')
            ->assertPresent('@slika')

        ;
    }

    public function testiranjeNavigacije(Browser $browser){
        $browser->clickLink('Agencija Knjigovodsvto')
            ->assertUrlIs($this->baseUrl().'/agencija')
            ->back()
            ->assertUrlIs($this->baseUrl().'/')
            ;
    }
}
