<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 15.01.2019.
 * Time: 09.28
 */

namespace Tests\Browser\utilities;


class ElementHelper
{
protected $data;

    /**
     * Elementi sideBara dati u obliku liste [textLink,href]
     * @return array
     */
public function sideBarElements(){
    $this->data=[
        ['Kategorije','/kategorije'],
        ['Oblasti','/admin/oblast'],
        ['Useri','/user'],
        ['Tipovi','/admin/tipovi'],
        ['Postovi','/admin/postovi'],
        ['Menu','/admin/menu'],
        ['Dokumenti','/admin/dokumenti'],

    ];
    return $this->data;
}

public function menuElements(){
    $this->data=[
        ['Početna','/'],
        ['Knjigovodstvo','/agencija'],
        ['Softver','/softver'],
        ['Novosti','/vesti'],
        ['O nama','/about'],
        ['Kontakt','/kontakt'],
        ['Dokumenta','/download']
    ];
    return $this->data;
}


}