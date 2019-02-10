<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
//Dodat Dusk dashboard
//use BeyondCode\DuskDashboard\Testing\TestCase as BaseTestCase;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

use App\User;




abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $data;
    protected $user;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            '--headless',
            '--window-size=1920,1080',
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    //Setovanje usera
    protected function createUser($userId){
        $this->user=User::find($userId);
    }
    //Setovanje admina
    protected function createAdmin($userId){
        $this->user=User::find($userId);
    }

    protected function loginAsUser($page,$data=null){
        $this->createUser($this->data['userId']);
        $this->browse(function ($user) use ($page,$data) {
            $user->loginAs($this->user)
                //Insanciranje Kategorije page
                ->visit(new $page($data));
        });
    }

    protected function logingAsAdministrator($page,$data=null){
        $this->createAdmin($this->data['userId']);

        $this->browse(function ($user) use ($data,$page) {
            $user->loginAs($this->user)
                //Insanciranje Kategorije page
                ->visit(new $page($data));
        });
    }

}
