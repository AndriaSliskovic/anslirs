<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectCat extends Model
{
    protected $fillable=[
        'name'
        ];
    //Tabela nije definisana po konvenciji
    protected $table = 'sect_cats';

    public function section(){
        return $this->hasMany('App/Section');
    }

}
