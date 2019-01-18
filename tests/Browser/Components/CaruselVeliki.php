<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;

class CaruselVeliki extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '@caruserVeliki';
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
        foreach ($browser->osnovniElementi as $el){
            $browser->waitForText($el)
                ->assertSee($el)
                ->pause(4000);
        }
    }

    public function agencijaOsnovniElementiKomponente(Browser $browser){
        foreach ($browser->osnovniElementi as $el){
            $browser->assertSee($el)
                ->pause(4000);
        }
//        $browser->assertSee('Kompletna')
//            ->pause(4000)
//            ->assertSee('Praćenje propisa')
//            ->pause(4000)
//            ->assertSee('Izrada završnih računa')
//
//        ;
    }
    public function proveraPodatakaIzModela($browser){
//      !!! $browser->sectionId je setovani properti
        $data=$this->carusel($browser->sectionId);
        foreach ($data as $d){
            if ($d->podnaslov){
                $browser->assertSee($d->naslov)
                    ->assertSee($d->podnaslov)
                    ->pause(4000);
            }
            $browser->assertSee($d->naslov)
//                ->assertSee($d->podnaslov)
                ->pause(4000);
        }
    }

    public function carusel($secID){
        return Section::where('sec_id',$secID)->get();
    }
}
