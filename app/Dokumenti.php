<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumenti extends Model
{
    protected $fillable=[
        'name',
        'opis',
        'putanja',
        'oblast_id',
        'vremeIzrade'
    ];
    public function oblast(){
        return $this->belongsTo('App\Oblast');
    }
}
