<?php

namespace App\DataTransferObject;


use App\Post;
use Illuminate\Http\Request;

class PostDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $naslov;
public $slug;
public $sadrzaj;
public $vremeIzrade;
public $skill;
public $slika;
public $category_id;
public $tipovi_id;
public $user_id;


    protected $dates = ['vremeIzrade'];

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->dtoData();
        $this->slug=str_slug($this->naslov);
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>PostDTO::class,
            'routeName'=>'postovi',
            'viewPath'=>'CRUD.postovi',
            'naslov'=>null,
            'defaultImage'=>'uploads/postovi/default.png',
        ];
        return $this->data;
    }

    //Podaci za sliku
    public function dtoImage(){
        $this->image=[
            'name'=>'slika',
            'directory'=>'uploads/postovi',
            'rules'=>null,
            'maxSize'=>null,
            'messages'=>null
        ];
        return $this->image;
    }
    public function dtoFile(){
        return null;
    }

    public function getRules()
    {
        return [
            'naslov'=>'required|min:2|max:60',
            'sadrzaj'=>'required|min:2',
        ];
    }

    public function getModelClass()
    {
        return Post::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'naslov.required'=>'Potrebno je uneti naslov',
            'naslov.min'=>'naslov mora imati minimalno 2 karaktera',
            'naslov.max'=>'naslov ne moze imati vise od 60 karaktera',
            'sadrzaj.required'=>'Potrebno je uneti sadrzaj',
            'sadrzaj.min'=>'sadrzaj mora imati minimalno 2 karaktera',

        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran post';
    }

}