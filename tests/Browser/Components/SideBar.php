<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class SideBar extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#sidebar';
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
            "@homeLink" => ".flex-column [href='http\:\/\/localhost\:8000']",
            "@kategorijeLink"=>".nav-item:nth-of-type(2) .nav-link",
            "@oblastiLink"=>".nav-item:nth-of-type(3) .nav-link",
            "@useriLink"=>".nav-item:nth-of-type(4) .nav-link",
            "@tipoviLink"=>".nav-item:nth-of-type(5) .nav-link",
            "@postoviLink"=>".nav-item:nth-of-type(6) .nav-link",
            "@menuLink"=>".nav-item:nth-of-type(7) .nav-link",
            "@dokumentiLink"=>".nav-item:nth-of-type(8) .nav-link",
            "@frontLink"=>"li:nth-of-type(9) > a:nth-of-type(1)",
            "@sekcijeLink"=>"[href='http\:\/\/localhost\:8000\/admin\/section']",
            "kategorijeLink"=>"[href='http\:\/\/localhost\:8000\/admin\/section']"
        ];
    }

    public function sideBarClickHome(){
        $this->browse(function (Browser $browser) {
            $browser->click("@homeLink");
        });
    }
    public function sideBarClickKategorije(){
        $this->browse(function (Browser $browser) {
            $browser->clickLink("@kategorijeLink");
        });
    }


}
