<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Post;
use Tests\Browser\utilities\ElementHelper;

class MaliBlog extends BaseComponent
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
        $data=$this->postoviPoSkillu($this->data['skill'],$this->data['paginacija']);
        foreach ($data as $d){
            //Provera naslova
            $browser
                //Provera linka
                ->assertSeeLink($d->name)
            ;
            //Provera da li je odgovarajuca slika ucitana
            $selectorSlike=['#vazniPostovi .img-responsive'];
            if (isset($selectorSlike)){
                foreach ($selectorSlike as $s){
                    $s=ElementHelper::selektorSlike($browser,$s);
                    $browser->assertPresent($s);
                }
            };
        }
    }

    public function testiranjeNavigacijeKategorija(Browser $browser){
        $data=$this->postoviPoSkillu($this->data['skill'],$this->data['paginacija']);
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
        $brojPostova=$this->brojPostovaPoSkillu($this->data['skill']);
        //Zaokruzuje na prvi veci broj
        $maxPaginacija=ceil($brojPostova/$this->data['paginacija']);
        //Proverava da li je prikazan maksimalan broj panigacije
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        //Proverava da li je prikazana kompletna panigacija
        $browser->assertSeeIn('.pagination',$maxPaginacija);
        for ($i=1;$i<$maxPaginacija+1;$i++){
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
