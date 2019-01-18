<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Post;
use Tests\Browser\utilities\ElementHelper;

class MaliBlog extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#vazniPostovi';
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
            '@paginacija'=>'.pagination'
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
        //Treba zadati apsolutnu putanju selektora
        $selectorSlike=['#vazniPostovi .img-responsive'];
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
        $skill=5;
        $paginacija=3;
        $data=$this->postoviPoSkillu($skill,$paginacija);
        foreach ($data as $d){
            //Pristupanje src atributu preko JQuerija
            $srcAtribut=$browser->script("return $('#vazniPostovi .img-responsive').attr('src')");
            //Selektovanje elementa preko src atributa
            $selectorSlike='[src="'.$srcAtribut[0].'"]';
//            dd($selectorSlike);
            //Provera naslova
            $browser
                //Provera linka
                ->assertSeeLink($d->name)
                //Provera da li je odgovarajuca slika ucitana
                ->assertPresent($selectorSlike);
            ;
        }
    }

    public function testiranjeNavigacijeKategorija(Browser $browser){
        $skill=5;
        $paginacija=3;
        $data=$this->postoviPoSkillu($skill,$paginacija);
        //Testiranje prvog posta
        $browser->clickLink($data[0]->naslov)
            //Provera preko rute
            ->assertRouteIs('single',$data[0]->slug)
            ->back()
            ->waitForRoute('home');

        //Testiranje svih ucitanih postova
        foreach ($data as $d){
            $browser
                ->waitForLink($d->naslov)
                ->clickLink($d->naslov)
                //Provera preko rute
                ->assertRouteIs('single',$d->slug)
                ->back()
                ->waitForRoute('home')
            ;
        }
        $browser->assertRouteIs('home');
    }

    public function brojMaxPaginacije(Browser $browser){
        $brojPostova=$this->brojPostovaPoSkillu($browser->skill);
        //Zaokruzuje na prvi veci broj
        $maxPaginacija=ceil($brojPostova/$browser->paginacija);
        //Proverava da li je prikazan maksimalan broj panigacije
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        //Proverava da li je prikazana kompletna panigacija
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        for ($i=1;$i=$maxPaginacija+1;$i++){
            $browser->assertSeeIn('.pagination',$i);
        };

    }



    public function postoviPoSkillu($skill,$pag){
        return Post::where('skill',$skill)->orderBy('vremeIzrade','decs')->paginate($pag);
    }

    public function brojPostovaPoSkillu($skill){
        return Post::where('skill',$skill)->count();
    }
}
