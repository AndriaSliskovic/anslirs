<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;
use Tests\Browser\utilities\StringHelpers;
use Tests\Browser\utilities\ElementHelper;

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
            '@selektorSlike' => '.aboutimg'
        ];
    }

    public function osnovniElementiKomponente(Browser $browser){

        foreach ($browser->osnovniElementi as $key=>$value){
            //Ukoliko je dat multidimenzionalni niz poziva staticku metodu helpera
            if (is_array($value)){
                ElementHelper::osnovniElementi($browser,$key,$value);
            }else{
                //Ukoliko nije niz ispituje tekst
                $browser->assertSee($value);
            }
        }
            //Ukoliko ima sliku provera da li je niz odgovarajucih slika ucitan
            $selectorSlike=['.aboutimg'];
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
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
