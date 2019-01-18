<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Menu;
use App\Settings;
use Tests\Browser\utilities\ElementHelper;
use Tests\Browser\utilities\StringHelpers;

class Footer extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '.photofoot';
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
            '@adresa' => 'address',
            '@donjiMeni'=>'.fmenu'
        ];
    }

    public function osnovniElementiFootera($browser){
        $settings=Settings::first();
        //U tacno naznacenom polju treba da se nalaze elementi
        $browser->assertSeeIn('@adresa', $settings->adresa)
            ->assertSeeIn('@adresa', $settings->mesto)
            ->assertSeeIn('@adresa', $settings->email)
            ->assertSeeIn('@adresa', $settings->telefon)
            ->assertSee('Kompletna knjigovodsvena usluga sa pratećim softverom i softverom po želji')
        ;
    }

    public function footerMenu($browser){
        $menuAll=$this->menu();
        //Da li se vide svi linkovi menija ucitani iz baze
        foreach ($menuAll as $m){
            $browser->assertSeeLink($m['name']);
        }

    }

    public function proveraPodatakaIzModela(){

    }

    public function navFooterMenu(Browser $browser){
        $menuAll=$this->menu();
        $browser->waitFor('@donjiMeni',8);
        $browser->waitForLink('Početna')
        ->assertSeeLink('Početna');
        foreach ($menuAll as $m){
            $browser->waitForLink($m->name)
                ->clickLink($m->name)
                ->assertRouteIs($m->putanja);
        };
    }

    public function menu(){
        $menu=Menu::all();
        return $menu;
    }
}
