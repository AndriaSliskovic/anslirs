<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Category;

class Kategorije extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#kategorije';
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
        $browser->assertSee('KATEGORIJE')
        ;
    }

    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->kategorijePostova();
        foreach ($data as $d){
            $browser
                //Provera uk broja postova po kategoriji
                ->assertSee($d->posts->count())
                //Provera linka kategorije
                ->assertSeeLink($d->name)
            ;
        }

    }

    public function testiranjeNavigacijeKategorija(Browser $browser){
        $data=$this->kategorijePostova();
        //Testiranje prve kategorije
        $browser->clickLink($data[0]->name)
            //Provera preko rute
            ->assertRouteIs('katPostova',$data[0]->id)
            ->back()
            ->waitForRoute('home');

        //Testiranje svih ucitanih kategorija
        foreach ($data as $d){
            $browser
                ->waitForLink($d->name)
                ->clickLink($d->name)
                //Provera preko rute
                ->assertRouteIs('katPostova',$d->id)
                ->back()
                ->waitForRoute('home')
            ;
        }
        $browser->assertRouteIs('home');
    }


    public function kategorijePostova(){
        $kategorije=Category::with('posts')->get();
        return $kategorije;
    }
}
