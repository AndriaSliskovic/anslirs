<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\utilities\ElementHelper;
use App\Post;

class PostPage extends Page
{
    protected $data;
    protected $ruta;

    public function __construct($data=null)
    {
        $this->data = $data;
        $this->ruta='postovi.index';
    }

        /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/postovi';
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
            '@naslovInput'=>'.card-body [name=naslov]',
            '@sadrzajInput'=>'[contenteditable]',
            '@skillInput'=>'.card-body [name=skill]',
            '@datePicker'=>'.card-body [name=vremeIzrade]',
            '@unesiButton'=>'.card-header [type="button"]',
            '@cancelButton'=>'.btn-warning',
            '@submitButton'=>'.card-body [type="submit"]',
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
        //Slika u obliku niza - proverava da li je prisutan src atribut
        $selectorSlike=['table tbody img'];
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
        ;
    }

    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->sviPostovi();
        foreach ($data as $d){
            //Provera naslova
            $browser->assertSee($d->naslov)
                //Provera ucitanih kategorija
                ->assertSee($d->category->name)
                //Provera ucitanih oblasti
                ->assertSee($d->category->oblast->name)
            ;
        }
    }

    public function unesiZapis(Browser $browser){
        $testUnos=$this->data['text'];
        $testSlika='/testImages/postTest.png';
        $messageSucces='Uspesno upisani podaci';
        $browser->click('@unesiButton')
            ->assertRouteIs('postovi.create');
        //Provera cancel
        $browser->click('@cancelButton')
            ->assertRouteIs($this->ruta)
            ->back();
        //Unosenje podataka
        $browser->clear('@naslovInput')
            ->type('@naslovInput',$testUnos)
            ->type('@sadrzajInput',$testUnos)
            ->type('@skillInput',5)
            ->type('@datePicker','01012001')
            ->select('category_id',1)
            ->select('tipovi_id',1)
            ->select('user_id',13)
            ->attach('slika', __DIR__.$testSlika)
            ->click('@submit')
        ->assertRouteIs($this->ruta);
        //Provera poruke u toasteru metod je u nadredjenoj klasi
        $this->toastrSuccess($browser,$messageSucces);
        $browser->assertRouteIs($this->ruta)
            ->assertSee($testUnos)
        ;
        ;
    }

    public function promeniZapis(Browser $browser){
        $testPost=$this->pronadjiPostPoImenu($this->data['text']);
//        dd($this->testPost);
        $id=$testPost->id;
        //Klik na odredjeni zapis
        $browser->click('@promeni-'.$id.'');
        //Proverava dobijeno ime oblasti sa podatkom iz modela
        $browser->assertValue('@naslovInput',$testPost->naslov);
        //Provera cancel
        $browser->click('@cancelButton')
            ->assertRouteIs($this->ruta)
            ->back();
        //MENJANJE PODATAKA
        $izmenjenText='Izmenjen tekst';
        $browser->clear('@naslovInput')
            ->type('@naslovInput',$izmenjenText)
            ->click('@submit')
        ;
        //Povratak na stranicu index
        $browser->assertRouteIs($this->ruta)
            ->assertSee($izmenjenText);
        //Provera da li tekst pravilno upisan
        //Klik na odredjeni zapis
        $browser->click('@promeni-'.$id.'');
        $browser->assertValue('@naslovInput',$izmenjenText);
        //VRACANJE NA STARE PODATKE
        $browser->clear('@naslovInput')
            ->type('@naslovInput',$this->data['text'])
            ->click('@submit');
        //Povratak na stranicu index
        $browser->assertRouteIs($this->ruta)
            ->assertSee($this->data['text']);
    }

    public function obrisiZapis(Browser $browser){
        $testPost=$this->pronadjiPostPoImenu($this->data['text']);
        $browser->assertSee($this->data['text']);
        $id=$testPost->id;
        //Klik na odredjeni zapis
        $browser->click('@obrisi-'.$id.'')
            ->assertRouteIs($this->ruta)
            ->assertDontSee($this->data['text'])
        ;
    }


    public function sviPostovi(){
        $oblasti=Post::all();
        return $oblasti;
    }

    public function pronadjiPostPoImenu($text){
        $oblast=Post::where('naslov',$text)->first();
        return $oblast;
    }
}
