<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'naslov',
        'slug',
        'sadrzaj',
        'vremeIzrade',
        'skill',
        'slika',
        'category_id',
        'tipovi_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tipovi(){
        return $this->belongsTo('App\Tipovi');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
