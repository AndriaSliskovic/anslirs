<?php

namespace Tests;

use App\User;
use App\Settings;
use Exception;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    protected $user;
    protected $settings;

    protected function setUp ()
    {
        parent::setUp();
        //Setuje usera koji ce biti ulogovan !!!
        $this->user=createFactory(User::class);
        //Ukljucuje signIn metod
        $this->signIn($this->user)->disableExceptionHandling();
        //Pocetna podesavanja sajta
        $this->settings=createFactory(Settings::class);
    }

    //Dodato - dozvoljava chaining metod posle pozivanja sigIn
    protected function signIn($user){
        //The actingAs helper method provides a simple way to authenticate a given user as the current user
        $this->actingAs($user);
        return $this;
    }
    //Sprecava gustu da pristupi stranici transakcija
    protected function signOut(){
        $this->post('/logout');
        return $this;
    }
    protected function disableExceptionHandling ()
    {
        $this->oldExceptionHandler = app()->make(ExceptionHandler::class);
        app()->instance(ExceptionHandler::class, new PassThroughHandler);
    }

    protected function withExceptionHandling ()
    {
        app()->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }
    //Overajdovani metodi za pozivanje factorija za logovanog usera - poziva createFactory helper
    function createTestFactory($class, $attributes=[], $times=null){
        return createFactory($class,array_merge(['user_id'=>$this->user->id],$attributes),$times);
    }

    function makeTestFactory($class, $attributes=[], $times=null){
        return makeFactory($class,array_merge(['user_id'=>$this->user->id],$attributes),$times);
    }

//    //Metod za preskakanje testa
//    public function testThatWontBeExecuted()
//    {
//        $this->markTestSkipped( 'PHPUnit will skip this test method' );
//    }

}

class PassThroughHandler extends Handler
{
    public function __construct () {}

    public function report (Exception $e) {}

    public function render ($request, Exception $e)
    {
        throw $e;
    }


}
