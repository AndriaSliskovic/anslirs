<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Menu;
use Tests\Browser\utilities\ElementHelper;

class MenuComponent extends BaseComponent
{
    protected $link;
    protected $href;
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '.headmenu';
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
            '@menu'=>'.menu'
        ];
    }

    public function headerMenu($menu){
        $menuAll=Menu::all();
        //Da li se vide svi linkovi menija ucitani iz baze
        foreach ($menuAll as $m){
            $menu->assertSeeLink($m['name']);
        }
    }

    public function navMainMenu($browser){
        $elementi=new ElementHelper();
        $elementi=$elementi->menuElements();
        //Koristi spoljne podatke iz ElementHelpera
        foreach ($elementi as list( $link,$href)){
            $browser->waitFor('@menu',8);
                $browser->clickLink($link)
                ->assertUrlIs($this->baseUrl().$href);
        };
    }





}
