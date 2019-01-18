<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;
use Tests\Browser\utilities\StringHelpers;

class About extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#about';
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

        //Pristupanje src atributu preko JQuerija
        $srcAtribut=$browser->script("return $('.aboutimg').attr('src')");
        //Selektovanje elementa preko src atributa
        $selectorSlike='[src="'.$srcAtribut[0].'"]';

        foreach ($browser->osnovniElementi as $el){
            $browser->assertSee($el);
        }
            //Provera da li je odgovarajuca slika ucitana
            $browser->assertPresent($selectorSlike);
        ;
    }

    public function agenOsnovniElementiKomponente(Browser $browser){

        //Pristupanje src atributu preko JQuerija
        $srcAtribut=$browser->script("return $('.aboutimg').attr('src')");
        //Selektovanje elementa preko src atributa
        $selectorSlike='[src="'.$srcAtribut[0].'"]';
        $browser->assertSee('SLIŠKOVIĆ JELENA')
            ->assertSee('Šef knjigovodstva')
            //Provera da li je odgovarajuca slika ucitana
            ->assertPresent($selectorSlike);
        ;
    }

    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->section($browser->sectionId);
        //Pristupanje src atributu preko JQuerija
        $srcAtribut=$browser->script("return $('.aboutimg').attr('src')");
        //Selektovanje elementa preko src atributa
        $selectorSlike='[src="'.$srcAtribut[0].'"]';
        //Problem sa Srpskim upercase šđčćž - poziva helper stringa
        $nameToUper=new StringHelpers();
        $naslov=$nameToUper->srbStringUper($data->naslov);
        $browser->assertSee($naslov)
            ->assertSee($data->podnaslov)
            //Provera da li je odgovarajuca slika ucitana
            ->assertPresent($selectorSlike);
        ;
    }


    public function section($idCatSec){
        return Section::where('sec_id',$idCatSec)->first();
    }
}
