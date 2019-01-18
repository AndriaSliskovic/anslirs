<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 15.01.2019.
 * Time: 09.28
 */

namespace Tests\Browser\utilities;


use Laravel\Dusk\Browser;

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

public static function osnovniElementi(Browser $browser,$key,$value){
//    dd($key);
    switch ($key){
        case 'text':
            foreach ($value as $v){
//                dd($v);
                $browser->assertSee($v);
            }
            break;
        case ('link'):
            foreach ($value as $v){
                $browser->assertSeeLink($v);
            }
            break;
        default :
            foreach ($value as $v){
                $browser->assertVisible($v);
            }
    }
}

public static function selektorSlike($browser,$selector){
    //Pristupanje src atributu preko JQuerija
    $srcAtribut=$browser->script("return $('".$selector."').attr('src')");
    //Selektovanje elementa preko src atributa
    $selectorSlike='[src="'.$srcAtribut[0].'"]';
    return $selectorSlike;
}



}