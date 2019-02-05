<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;
use Tests\Browser\utilities\ElementHelper;


class OpstiDeo extends BaseComponent
{
    protected $ruta;
    protected $data;
    public function __construct($data=null)
    {
        $this->data=$data;
        $this->ruta=$this->baseUrl().'/about';
    }

    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '@opstiDeo';
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
//                $browser->waitFor('@opstiDeo > p');
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

    public function testiranjeNavigacije(Browser $browser){
        $link=$this->data['elementi']['link'][0];
        $browser->waitForLink($link)
            ->clickLink($link)
            ->assertUrlIs($this->ruta)
            ->back()
            ->assertUrlIs($this->baseUrl().'/')
        ;
    }

    public function proveraPodatakaIzModela(Browser $browser){
        $sectionId=4;
        $data=$this->section($sectionId);
        //Sadrzaj u bazi je upisan sa html tagom <p> i </p> koji se mora ukloniti zbog testa
        $sadrzaj=str_replace(['<p>','</p>'],'',$data->sadrzaj);
        //Sada se razdvaja zato sto je pojedinacno prikazan na stranici
        $sadrzaj=explode('.',$sadrzaj);
        //Uklanja posledne prazno polje u nizu
        $noviNiz=array_pop($sadrzaj);
        //Provera kompletnog teksta u sadrzaju
        foreach ($sadrzaj as $s){
            $browser->assertSee($s);
        }
            $browser->assertSeeLink($data->naslov)
        ;
    }

    public function section($idCatSec){
        return Section::where('sec_id',$idCatSec)->first();
    }

    public function sectionTestBase(){

    }
}
