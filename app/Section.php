<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=[
        'sec_id',
        'naslov',
        'podnaslov',
        'sadrzaj',
        'slika',
        'link'
    ];


    public function sectCat(){
        return $this->belongsTo('App\SectCat','sec_id');
    }

//    public function category(){
//        return $this->belongsTo('App\Category');
//    }

}
