<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Section;

class OpstiDeo extends BaseComponent
{
    protected $ruta;
    public function __construct()
    {
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
        $browser->assertSee('Kompanija koja se bavi knjigovodstvenim uslugama i izradom softvera za knjigovodstvene agencije.')
            ->assertSeeLink('O nama')
        ;
    }

    public function testiranjeNavigacije(Browser $browser){
        $browser->clickLink('O nama')
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
}
