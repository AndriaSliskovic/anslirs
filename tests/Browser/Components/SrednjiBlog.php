<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Oblast;
use Tests\Browser\utilities\ElementHelper;

class SrednjiBlog extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#srednjiBlog';
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
        //Treba zadati apsolutnu putanju selektora zbog jQueryja
        $selectorSlike=['.img-responsive'];
        if (isset($selectorSlike)){
            foreach ($selectorSlike as $s){
//                dd($s);
                $s=ElementHelper::selektorSlike($browser,$s);
                $browser->assertPresent($s);
            }
        }
        ;
    }


    public function proveraPodatakaIzModela(Browser $browser){
        $data=$this->postoviPoOblasti($browser->oblastId,$browser->paginacija);
        foreach ($data as $d){
            //Pristupanje src atributu preko JQuerija
            $srcAtribut=$browser->script("return $('.img-responsive').attr('src')");
            //Selektovanje elementa preko src atributa
            $selectorSlike='[src="'.$srcAtribut[0].'"]';
            //Provera naslova
            $browser->assertSee($d->naslov)
                //Provera kategorije
                ->assertSee($d->category->name)
                //Provera objavio
                ->assertSee($d->user->name)
                //Provera linka
                ->assertSeeLink('Pročitaj više')
                //Provera da li je odgovarajuca slika ucitana
                ->assertPresent($selectorSlike);
            ;
        }

    }

    public function testiranjeNavigacijePosta(Browser $browser){
        $data=$this->postoviPoOblasti($browser->oblastId,$browser->paginacija);
        //Testiranje prvog posta
        $browser->clickLink($data[0]->naslov)
            //Provera preko rute
            ->assertRouteIs('single',$data[0]->slug)
            ->back()
            ->waitForRoute($browser->ruta);

        //Testiranje svih ucitanih postova
        foreach ($data as $d){
            $browser
                ->waitForLink($d->naslov)
                ->clickLink($d->naslov)
                //Provera preko rute
                ->assertRouteIs('single',$d->slug)
                ->back()
                ->waitForRoute($browser->ruta)
            ;
        }
        //Wait da bi se izvrsio sledeci test
        $browser->pause(4000);
        $browser->assertRouteIs($browser->ruta);
    }
    public function postoviPoOblasti($idOblast,$pag=null){
        $postovi=Oblast::find($idOblast)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
        return $postovi;
    }

    public function brojMaxPaginacije(Browser $browser){
        $brojPostova=$this->brojPostovaPoOblasti($browser->oblastId);
        //Zaokruzuje na prvi veci broj
        $maxPaginacija=ceil($brojPostova/$browser->paginacija);
        //Proverava da li je prikazan maksimalan broj panigacije
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        //Proverava da li je prikazana kompletna panigacija (ukoliko je to predvidjeno u bladeu)
        for ($i=1;$i<$maxPaginacija+1;$i++){
            $browser->assertSeeIn('.pagination',$i);
        };

    }

    public function brojPostovaPoOblasti($idOblast){
        return Oblast::find($idOblast)->posts()->count();
    }

}
