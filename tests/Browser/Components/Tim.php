<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use Tests\Browser\utilities\ElementHelper;
use Tests\Browser\utilities\StringHelpers;
use App\Section;

class Tim extends BaseComponent
{
    protected $data;
    public function __construct($data=null)
    {
        $this->data=$data;
    }

    public function selector()
    {
        return '#aboutSoftver';
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
        $selectorSlike=['#aboutSoftver .rightblog .aboutimg'];
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
//        dd($data);
        foreach ($data as $d){
            //Na strani su prikazana velika slova
            $naslov=StringHelpers::srbStringUper($d->naslov);
            //Provera naslova
            $browser->assertSee($naslov)
                //Provera podnaslova
                ->assertSee($d->podnaslov)
            ;
            $selectorSlike=['#aboutSoftver .rightblog .aboutimg'];
            if (isset($selectorSlike)){
                foreach ($selectorSlike as $s){
                    $s=ElementHelper::selektorSlike($browser,$s);
                    $browser->assertPresent($s);
                }
            }
        }
    }

    public function section($idCatSec){
        return Section::where('sec_id',$idCatSec)->get();
    }
}
