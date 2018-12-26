<?php

namespace App\DataTransferObject;



use App\SectCat;
use Illuminate\Http\Request;

class Sect_CatDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $name;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>Sect_CatDTO::class,
            'routeName'=>'sectCat',
            'viewPath'=>'CRUD.sectCat',
            'naslov'=>'Podaci o kategorijama sekcija',
        ];
        return $this->data;
    }
    public function dtoImage(){
        return null;
    }
    public function dtoFile(){
        return null;
    }

    public function getRules()
    {
        return [
            'name'=>'required|min:2|max:60',
        ];
    }

    public function getModelClass()
    {
        return SectCat::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'name.required' => 'Odaberite bar jedanu kategoriju',
            'name.min'=>'kategorija mora imati minimalno 2 karaktera',
            'name.max'=>'kategorija ne moze imati vise od 60 karaktera',
        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreirana kategorija sekcije';
    }


}