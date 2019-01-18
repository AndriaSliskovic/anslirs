<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 14.01.2019.
 * Time: 10.50
 */

namespace Tests\Browser;


class Podaci
{
    protected $data;


    public function logValidData(){
        $this->data['email']='admin@mail.com';
        $this->data['password']='1Qwert';
        return $this->data;
    }

    public function logNonAuthUser(){
        $this->data['email']='nepostojeci@mail.com';
        $this->data['password']='secret';
        return $this->data;
    }

    public function logIvalidUser(){
        $this->data['email']='invalidmail.com';
        $this->data['password']='secret';
        return $this->data;
    }

    public function regValidUser(){
        $this->data['ime']='user1 test';
        $this->data['email']='user1@mail.com';
        $this->data['password']='secret';
        return $this->data;
    }

    public function regInvalidUser(){
        $this->data['ime']='Test User4';
        $this->data['email']='testUser4@mail.com';
        $this->data['password']='secret';
        return $this->data;
    }
}