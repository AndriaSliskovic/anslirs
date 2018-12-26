<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=[
        'name',
        'putanja',
        'level',
        'tezina',
        'oblast_id'
    ];
    public function oblast(){
        return $this->belongsTo('App\Oblast');
    }
}
