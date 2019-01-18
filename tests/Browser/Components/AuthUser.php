<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class AuthUser extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '.user';
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
            '@auth_name' => '.user__name',
            '@auth_email'=>'.user__email',
            '@auth_image'=>'.user__img',
            '@view_profile'=>'[x-placement] .dropdown-item:nth-of-type(1)',
            '@logout'=>'[x-placement] .dropdown-item:nth-of-type(2)',
            '@super_admin'=>'[x-placement] .dropdown-item:nth-of-type(3)'
        ];
    }

    public function selectAuthUser($browser){
            $browser->click('@auth_name')
                ->assertSee('View Profile');
    }

    public function clickOnViewProfile($browser){
        //Ubacen metod baseUrl() u Laravel\Dusk\Component
//        dd($browser->idUsera);
        //Prethodno setovan properti za $browser->idUsera
        $viewProfileRoute=$this->baseUrl().'/profile/'.$browser->idUsera;
            $browser->clickLink('View Profile')
                ->assertUrlIs($viewProfileRoute);
    }

    public function clickOnSuperAdminPodesavanja($browser){
        $superAdminRuta=$this->baseUrl().'/admin/settings';
        $browser->clickLink('Super admin podesavanja')
            ->assertUrlIs($superAdminRuta);
    }



}
