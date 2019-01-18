<?php

namespace Tests\Browser;

use Tests\Browser\Components\AuthUser;
use Tests\Browser\Components\SideBar;
use Tests\Browser\Pages\AdminPocetna;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Tests\Browser\utilities\ElementHelper;

class AdminHomeTest extends DuskTestCase
{
    protected $user;

    //Setovanje usera
    protected function createUser(){
        $this->user=User::find(14);
    }
    //Setovanje admina
    protected function createAdmin(){
        $this->user=User::find(13);
    }

    protected function logingAsAdministrator(){
        $this->createAdmin();
        $this->browse(function ($user) {
            $user->loginAs($this->user)
                ->visit(new AdminPocetna);
        });
    }

    /**
     * @test
     * @group AdminHome
     */

    public function admin_home_elements(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator();
            $browser->assertUrlIs($this->baseUrl().'/adminHome');

        });
    }

    /**
     * @test
     * @group AdminHomeNavigacija
     */

    public function navigacija_admin_panela(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator();
            $browser->assertUrlIs($this->baseUrl().'/adminHome')
                ->clickLink('Kategorije')
                ->assertUrlIs($this->baseUrl().'/kategorije')
                ->clickLink('Oblasti')
                ->assertUrlIs($this->baseUrl().'/admin/oblast')
                ->clickLink('Useri')
                ->assertUrlIs($this->baseUrl().'/user')
                ->clickLink('Tipovi')
                ->assertUrlIs($this->baseUrl().'/admin/tipovi')
                ->clickLink('Postovi')
                ->assertUrlIs($this->baseUrl().'/admin/postovi')
                ->clickLink('Menu')
                ->assertUrlIs($this->baseUrl().'/admin/menu')
                ->clickLink('Dokumenti')
                ->assertUrlIs($this->baseUrl().'/admin/dokumenti')
                ->click('@userPolje')
                ->assertSee('View Profile','Logout','Super admin podesavanja')
                ->clickLink('View Profile')
                ->assertUrlIs($this->baseUrl().'/profile/'.$this->user->id)
                ->click('@userPolje')
                ->clickLink('Super admin podesavanja')
                ->assertUrlIs($this->baseUrl().'/admin/settings')
                ->click('@userPolje')
                ->clickLink('Logout')
                ->assertUrlIs($this->baseUrl()."/")
            ;

        });
    }

    /**
     * @test
     * @group AdminHomeNavigacija1
     */

    public function navigacija_admin_panela_skraceno(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator();
            //Ucitavam prethodno setovane podatke
            $elementi=new ElementHelper();
            $elementi=$elementi->sideBarElements();
            $browser->assertUrlIs($this->baseUrl().'/adminHome');
            //Koristim list metod za elemente definisane u helperu
            foreach ($elementi as list($link,$href)){
                $browser->clickLink($link)
                    ->assertUrlIs($this->baseUrl().$href);
            };

            ;

        });
    }

    /**
     * @test
     * @group PristupanjeKomponenti
     */
    public function provera_komponente_AuthUser(){
        $this->browse(function (Browser $browser) {
            $this->logingAsAdministrator();
            $browser->assertUrlIs($this->baseUrl().'/adminHome')
                    //Pristupanje komponenti AuthUser
                    ->within(new AuthUser(),function (Browser $browser){
                        // !! Setujem novi properti za browser sa id trenutnog usera
                        $browser->idUsera=$this->user->id;
                        $browser->selectAuthUser($browser)
                                ->clickOnViewProfile($browser)
                                ->back()
                            ->assertUrlIs($this->baseUrl().'/adminHome')
                            ->selectAuthUser($browser)
                            ->clickOnSuperAdminPodesavanja($browser)
                        ;
                })

            ;
        });
    }



}
