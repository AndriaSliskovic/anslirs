<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 14.03.2018.
 * Time: 13.47
 */

namespace App\Repository;

use App\Projekti;


class ProjektiRepository
{
    private static $data;

    public static function crudKonstruktor(){
        self::$data['logo']='Laravel 5.5';
        self::$data['sadrzaj']='defaultSadrzaj';
        self::$data['sidebar']='sidebar';
        self::$data['naslov']='naslov';
        self::$data['naslovProjekta']='CRUD Projekti - Admin panel';
        return self::$data;
    }
}