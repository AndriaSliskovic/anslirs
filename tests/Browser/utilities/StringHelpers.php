<?php

namespace Tests\Browser\utilities;


class StringHelpers
{
    public static function srbStringUper($string){
        $uperString=mb_strtoupper($string, 'UTF-8');;
        return $uperString;
    }
}