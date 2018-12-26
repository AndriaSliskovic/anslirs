<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblast extends Model
{
    protected $fillable=[
        'name'
    ];

    public function categories(){
        return $this->hasMany('App\Category');
    }
    public function posts(){
        return $this->hasManyThrough('App\Post','App\Category','oblast_id','category_id');
    }

    public function dokumenti()
    {
        return $this->hasMany('App\Dokumenti');
    }
}
