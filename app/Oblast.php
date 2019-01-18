<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblast extends Model
{
    protected $fillable=[
        'name'
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function posts(){
        return $this->hasManyThrough('App\Post','App\Category','oblast_id','category_id');
    }

    public function dokumenti()
    {
        return $this->hasMany('App\Dokumenti');
    }
    public function dodaj($category){
        $this->categories()->save($category);
    }
    //Overrajdovan metod
    public function count(){
        return $this->categories()->count();
    }

    public function dodajViseKategorijaOdjednom($category){
        //Ako imamo samo jedan zapis
        if ($category instanceof Category){
            return $this->posts()->save($category);
        }
        //Ako ima vise zapisa
        $this->categories()->saveMany($category);
    }
    public function brojKategorijaZaOblast(){
        return $this->categories()->count();
    }
}
