<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name',
        'oblast_id'
    ];
    public function oblast(){
        return $this->belongsTo('App\Oblast');
    }

    public function posts(){
        return $this->hasMany('App\Post','category_id');
    }
}
