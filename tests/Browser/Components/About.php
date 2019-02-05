<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;
use Tests\Browser\utilities\StringHelpers;
use Tests\Browser\utilities\ElementHelper;

class About extends BaseComponent
{

    protected $data;
    public function __construct($data=null)
    {
        $this->data=$data;
    }
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
        $elementi=$this->data['elementi'];
        foreach ($elementi as $key=>$value){
            //Ukoliko je dat multidimenzionalni niz poziva staticku metodu helpera
            if (is_array($value)){
                ElementHelper::osnovniElementi($browser,$key,$value);
            }else{
                //Ukoliko nije niz ispituje tekst
                $browser->assertSee($value);
            }
        }
        //Ukoliko ima sliku provera da li je niz odgovarajucih slika ucitan
        //Treba zadati apsolutnu putanju selektora
        $selectorSlike=null;
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
        ;
    }


    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->section($this->data['sectionId']);
        //Problem sa Srpskim upercase šđčćž - poziva helper stringa
        $nameToUper=new StringHelpers();
        $naslov=$nameToUper->srbStringUper($data->naslov);
        $browser->assertSee($naslov)
            ->assertSee($data->podnaslov)
        ;
        //Provera da li je odgovarajuca slika ucitana
        $selectorSlike=['#about .aboutimg'];
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
        ;

    }


    public function section($idCatSec){
        return Section::where('sec_id',$idCatSec)->first();
    }
}
