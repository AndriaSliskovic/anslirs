<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\utilities\ElementHelper;
use App\Category;
use App\Oblast;

class Kategorije extends Page
{
    protected $data;
    protected $testKategorija;
    protected $ruta;
    public function __construct($data=null)
    {
        $this->data=$data;
        $this->ruta='kategorije.index';
    }
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/kategorije';
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
        $data=$this->sveKategorije();
        foreach ($data as $d){
            //Provera naslova
            $browser->assertSee($d->name)
                //Provera oblasti
                ->assertSee($d->oblast->name)
            ;
        }
    }

    public function unesiZapis(Browser $browser){
        $testUnos=$this->data['text'];
        $browser->click('@unesiButton')
            ->assertSee('Unesi novu kategoriju');
        //Proverava select grupu
        $oblasti=$this->sveOblasti();
        //Proverava da li su svi optionsi ucitani u select - vraca niz
        $options=ElementHelper::getValuesOfSelectOptions($oblasti);
        $browser->assertSelectHasOptions('oblast_id',$options);

        $browser->clear('@nameInput')
            ->type('@nameInput',$testUnos)
            ->select('oblast_id', $this->data['iDOblast'])
            ->click('@submitButton');
        $this->testKategorija=$this->pronadjiKategorijuPoImenu($testUnos);
        $id=$this->testKategorija->id;
//        dd($id);
        $browser->assertRouteIs($this->ruta)
//            ->assertValue('@row-'.$id.'',$testUnos)
            ->assertSee($testUnos)
            ;
    }



    public function promeniZapis(Browser $browser){
        $this->testKategorija=$this->pronadjiKategorijuPoImenu($this->data['text']);
        $id=$this->testKategorija->id;
        //Klik na odredjeni zapis
        $browser->click('@promeni-'.$id.'')
        //Proverava naslov edit stranice
        ->value('@naslov','Podaci o kategorijama')
        ;
        //Proverava dobijeno ime kategorije sa podatkom iz modela
        $browser->assertValue('@nameInput',$this->testKategorija->name)
        //Proverava odgovarajucu vrednost option
            ->assertSelectHasOption('oblast_id',$this->data['iDOblast'])
        ;
        //MENJANJE PODATAKA
        $izmenjenText='Izmenjen tekst';
        $drugaOblast=$this->data['iDOblast']-1;
        $browser->clear('@nameInput')
            ->type('@nameInput',$izmenjenText)
            ->select('oblast_id', $drugaOblast)
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
            ->select('oblast_id', $this->data['iDOblast'])
            ->click('@submitButton');
        //Povratak na stranicu index
        $browser->assertRouteIs($this->ruta)
            ->assertSee($this->data['text']);
    }

    public function obrisiZapis(Browser $browser){
        $this->testKategorija=$this->pronadjiKategorijuPoImenu($this->data['text']);
        $browser->assertSee($this->data['text']);
        $id=$this->testKategorija->id;
        //Klik na odredjeni zapis
        $browser->click('@obrisi-'.$id.'')
                ->assertRouteIs($this->ruta)
                ->assertDontSee($this->data['text'])
        ;
    }

    public function sveKategorije(){
        $kategorije=Category::all();
        return $kategorije;
    }

    public function pronadjiKategorijuPoImenu($text){
        $kategorija=Category::where('name',$text)->first();
        return $kategorija;
    }

    public function odabranaKategorija($id){
        $kategorija=Category::find($id);
        return $kategorija;
    }

    public function sveOblasti(){
        return Oblast::all();
    }

}
