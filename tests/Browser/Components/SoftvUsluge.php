<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class SoftvUsluge extends BaseComponent
{
    protected $ruta;
    public function __construct()
    {
        $this->ruta=$this->baseUrl().'/softver';
    }

    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '@softvUsluge';
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
            '@slika' => "[dusk=\'softvUsluge\'] [alt]",
        ];
    }
    public function osnovniElementiKomponente(Browser $browser){
        $browser->assertSeeLink('Knjigovodstveni softver')
            ->assertPresent('@slika')

        ;
    }

    public function testiranjeNavigacije(Browser $browser){
        $browser->clickLink('Knjigovodstveni softver')
            ->assertUrlIs($this->ruta)
            ->back()
            ->assertUrlIs($this->baseUrl().'/')
        ;
    }
}
