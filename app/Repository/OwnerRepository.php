<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 14.03.2018.
 * Time: 13.47
 */

namespace App\Repository;

use App\Owner;



class OwnerRepository
{
    private static $data;

    public static function crudKonstruktor(){
        self::$data['logo']='Portfolio projekat';
        self::$data['sadrzaj']='defaultSadrzaj';
        self::$data['sidebar']='sidebar';
        self::$data['naslov']='naslov';
        self::$data['naslovProjekta']='CRUD Owner - Admin panel';
        return self::$data;
    }
}