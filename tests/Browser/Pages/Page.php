<?php
namespace Tests\Browser\Pages;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page as BasePage;
abstract class Page extends BasePage
{
    /**
     * Get the global element shortcuts for the site.
     *
     * @return array
     */
    public static function siteElements()
    {
        return [
            "@userPolje" => "[data-toggle]",
        ];
    }

    public function toastrSuccess(Browser $browser,$message){
        $browser->assertSeeIn('.toast-message', $message);
    }

    public function toastrError(Browser $browser,$message){
        $browser->assertSeeIn('.toast-error', $message);
    }
}