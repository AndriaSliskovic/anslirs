<?php

namespace Tests\Browser;

use Tests\Browser\Components\Tim;
use Tests\Browser\Components\TimAgencija;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OnamaTest extends DuskTestCase
{
    public function loadPage(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/about')
                ->pause(3000)
                ->assertUrlIs($this->baseUrl().'/about')
            ;
        });
    }

    /**
     * @test
     * @group AboutTeamSoft
     */

    public function komponenta_about_softver(){
        $this->data['elementi']=['SLIŠKOVIĆ ANDRIA','SLIŠKOVIĆ FILIP','ANTIĆ PREDRAG','JavaScript, C#','System administrator , SQL'];
        $this->data['sectionId']=12;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new Tim($this->data), function ($browser) {
                $browser
                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }

    /**
     * @test
     * @group AboutTeamAgen
     */

    public function komponenta_about_agencija(){
        $this->data['elementi']=['SLIŠKOVIĆ JELENA','ĐUKIĆ LJUBA','Kontista','Knjigovođa', 'MARKOVIĆ VESNA'];
        $this->data['sectionId']=15;
        $this->loadPage();
        $this->browse(function (Browser $browser) {
            $browser->whenAvailable(new TimAgencija($this->data), function ($browser) {
                $browser
//                    ->osnovniElementiKomponente($browser)
                    ->proveraPodatakaIzModela($browser)
                ;
            });

        });
    }
}
