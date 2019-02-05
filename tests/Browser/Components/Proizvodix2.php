<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use Tests\Browser\utilities\ElementHelper;
use App\Section;

class Proizvodix2 extends BaseComponent
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
        return '#proizvodix2';
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
        //Ocekuju se dve slike, koristi se for petlja
        for ($i=1;$i<3;$i++){
            $selectorSlike=["#proizvodix2 .slidebox:nth-of-type(".$i.") [alt]"];
            if (isset($selectorSlike)){
                foreach ($selectorSlike as $s){
                    $s=ElementHelper::selektorSlike($browser,$s);
                    $browser->assertPresent($s);
                }
            }
            ;
        }

    }

    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->proizvodi($this->data['secId']);
        foreach ($data as $d){
            //Provera naslova
            $browser->assertSee($d->naslov)
                //Provera podnaslov
                ->assertSee($d->podnaslov)
            ;
        }
        //  PROVERAVA DA LI SU PRIKAZANE SLIKE KOJE SU UCITANE IZ MODELA
        //Broj vracenih zapisa
        $brojzapisa=$data->count();
        $data=$data->toArray();
//        dd($brojzapisa);
        for ($i=1;$i<$brojzapisa+1;$i++){
            //Setuje svaku sliku posebno
            $selectorSlike="#proizvodix2 .slidebox:nth-of-type(".$i.") [alt]";
            if (isset($selectorSlike)){
                    $s=ElementHelper::selektorSlike($browser,$selectorSlike);
//                  Ispituje da li je prisutna
                    $browser->assertPresent($s);
//                   Vraca prvi clan niza
                    $src=ElementHelper::getSrcAttribute($browser,$selectorSlike);
//                  Uporedjuje sa modelom
                    if ($src == $data[$i-1]['slika']){
                        continue;
                    }else{
                        dd('Nije ucitana odgovarajuca slika !!!');
                    }
            }
            ;
        }

    }


    public function proizvodi($idCatSec){
        return Section::where('sec_id',$idCatSec)->get();
    }
}
