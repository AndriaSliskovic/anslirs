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

    public function dodajPost($post){
        return $this->posts()->save($post);
    }

    public function dodajVisePostovaOdjednom($post){
        //Ako imamo samo jedan zapis
        if ($post instanceof User){
            return $this->posts()->save($post);
        }
        //Ako ima vise zapisa upisuje se collection
        $this->posts()->saveMany($post);
    }
    //Overrajdovan metod
    public function brojPostovaZaKategoriju(){
        return $this->posts()->count();
    }

    public function ukloniKategorijuIzPosta(Post $post){
        //Updejtovanje direktno u tabeli - Void ako je u bazi dozvoljen null !!!
        //Ako nije dozvoljen null setujem na neku drugu vrednost -2
        $post->update(['category_id'=>2]);

    }
}
