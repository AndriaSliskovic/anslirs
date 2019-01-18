<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use App\Oblast;

class VelikiBlog extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '@velikiBlog';
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
        foreach ($browser->osnovniElementi as $el){
            $browser->assertSee($el);
        }
        $browser->assertSeeLink('Procitaj vise')
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
                ->assertSeeLink('Procitaj vise')
                //Provera da li je odgovarajuca slika ucitana
                ->assertPresent($selectorSlike);
            ;
        }

    }

    public function testiranjeNavigacijePosta(Browser $browser){
        $oblastId=3;
        $paginacija=3;
        $data=$this->postoviPoOblasti($oblastId,$paginacija);
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
    public function postoviPoOblasti($idOblast,$pag=null){
        $postovi=Oblast::find($idOblast)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
        return $postovi;
    }
}
