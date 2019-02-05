<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\utilities\ElementHelper;
use App\Category;
use App\Oblast;

class Oblasti extends Page
{
    protected $data;
    protected $testKategorija;
    protected $ruta;
    public function __construct($data=null)
    {
        $this->data=$data;
        $this->ruta='oblast.index';
    }
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/oblast';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
            '@naslov'=>'.card-header div:first-child >h4',
            '@nameInput'=>'.card-body [name=name]',
            '@unesiButton'=>'.card-header [type="button"]',
            '@select'=>'.select [name="oblast_id"]',
            '@submitButton'=>'.card-body [type="submit"]',
            '@cancelButton'=>'.btn-warning',
            '@toastr'=>'[data-sa-theme] script:nth-child(9)'
        ];
    }

    public function osnovniElementiStraniceIndex(Browser $browser){
//        dd($this->data);
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
        //Nema sliku tako da se ne proverava
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
        $data=$this->sveOblasti();
        foreach ($data as $d){
            //Provera naslova
            $browser->assertSee($d->name)
            ;
        }
    }

    public function unesiZapis(Browser $browser){
        $testUnos=$this->data['text'];
        $browser->click('@unesiButton')
            ->assertRouteIs('oblast.create');
        //Provera cancel
        $browser->click('@cancelButton')
            ->assertRouteIs($this->ruta)
            ->back();
        $browser->clear('@nameInput')
            ->type('@nameInput',$testUnos)
            ->click('@submitButton');
        $browser->assertRouteIs($this->ruta)
            ->assertSee($testUnos)
            ;
    }



    public function promeniZapis(Browser $browser){
        $this->testOblast=$this->pronadjiOblastPoImenu($this->data['text']);
        $id=$this->testOblast->id;
        //Klik na odredjeni zapis
        $browser->click('@promeni-'.$id.'')
        //Proverava naslov edit stranice
        ->value('@naslov','Podaci o oblastimaa')
        ;
        //Proverava dobijeno ime oblasti sa podatkom iz modela
        $browser->assertValue('@nameInput',$this->testOblast->name);
        //Provera cancel
        $browser->click('@cancelButton')
            ->assertRouteIs($this->ruta)
            ->back();
        //MENJANJE PODATAKA
        $izmenjenText='Izmenjen tekst';
        $browser->clear('@nameInput')
            ->type('@nameInput',$izmenjenText)
            ->click('@submitButton');
        //Povratak na stranicu index
        $browser->assertRouteIs($this->ruta)
            ->assertSee($izmenjenText);
        //Provera da li tekst pravilno upisan
        //Klik na odredjeni zapis
        $browser->click('@promeni-'.$id.'');
        $browser->assertValue('@nameInput',$izmenjenText);
        //VRACANJE NA STARE PODATKE
        $browser->clear('@nameInput')
            ->type('@nameInput',$this->data['text'])
            ->click('@submitButton');
        //Povratak na stranicu index
        $browser->assertRouteIs($this->ruta)
            ->assertSee($this->data['text']);
    }

    public function obrisiZapis(Browser $browser){
        $this->testOblast=$this->pronadjiOblastPoImenu($this->data['text']);
        $browser->assertSee($this->data['text']);
        $id=$this->testOblast->id;
        //Klik na odredjeni zapis
        $browser->click('@obrisi-'.$id.'')
                ->assertRouteIs($this->ruta)
                ->assertDontSee($this->data['text'])
        ;
    }


    public function sveOblasti(){
        $oblasti=Oblast::all();
        return $oblasti;
    }

    public function pronadjiOblastPoImenu($text){
        $oblast=Oblast::where('name',$text)->first();
        return $oblast;
    }




}
