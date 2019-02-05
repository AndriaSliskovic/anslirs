<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Oblast;
use Tests\Browser\utilities\ElementHelper;

class SrednjiBlogAll extends BaseComponent
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
        return '#srednjiBlogAll';
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
        //Ukoliko ima sliku provera da li je niz odgovarajucih slika ucitan
        //Treba zadati apsolutnu putanju selektora
        $selectorSlike=['.img-responsive'];
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
        ;
    }

    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->postoviPoTipu($this->data['tipId'],$this->data['paginacija']);
        foreach ($data as $d){
            //Provera naslova
            $browser->assertSee($d->naslov)
                //Provera kategorije
                ->assertSee($d->category->name)
                //Provera objavio
                ->assertSee($d->user->name)
                //Provera linka
                ->assertSeeLink('Pročitaj više')
            ;
            $selectorSlike=['#srednjiBlogAll .img-responsive'];
            if (isset($selectorSlike)){
                foreach ($selectorSlike as $s){
                    $s=ElementHelper::selektorSlike($browser,$s);
                    $browser->assertPresent($s);
                }
            }
        }

    }

    public function brojMaxPaginacije(Browser $browser){
        $brojPostova=$this->brojPostovaPoTipu($this->data['tipId']);
        //Zaokruzuje na prvi veci broj
        $maxPaginacija=ceil($brojPostova/$this->data['paginacija']);
        //Proverava da li je prikazan maksimalan broj panigacije
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        //Proverava da li je prikazana kompletna panigacija (ukoliko je to predvidjeno u bladeu)
        for ($i=1;$i<$maxPaginacija+1;$i++){
            $browser->assertSeeIn('.pagination',$i);
        };

    }

    public function testiranjeNavigacijePosta(Browser $browser){
        $data=$this->postoviPoTipu($this->data['tipId'],$this->data['paginacija']);
        //Testiranje prvog posta
        $browser->clickLink($data[0]->naslov)
            //Provera preko rute
            ->assertRouteIs('single',$data[0]->slug)
            ->back()
            ->waitForRoute($this->data['ruta']);

        //Testiranje svih ucitanih postova
        foreach ($data as $d){
            $browser
                ->waitForLink($d->naslov)
                ->clickLink($d->naslov)
                //Provera preko rute
                ->assertRouteIs('single',$d->slug)
                ->back()
                ->waitForRoute($this->data['ruta'])
            ;
        }
        //Wait da bi se izvrsio sledeci test
        $browser->pause(4000);
        $browser->assertRouteIs($this->data['ruta']);
    }


    public function postoviPoTipu($idTip,$pag){
        //!!!--Mora se definisati post() a ne ->post ,
        // da bi se dobio objekat koji se moze paginirati
        $postovi=Oblast::find($idTip)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
        return $postovi;
    }

    public function brojPostovaPoTipu($idTip){
        $postovi=Oblast::find($idTip)->posts()->count();
        return $postovi;
    }
}
