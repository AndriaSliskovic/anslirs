<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Dokumenti;
use Illuminate\Http\Request;

class DokumentiDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $name;
public $opis;
public $putanja;
public $oblast_id;
public $vremeIzrade;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>DokumentiDTO::class,
            'routeName'=>'dokumenti',
            'viewPath'=>'CRUD.dokumenti',
            'naslov'=>'Dokumenti',
        ];
        return $this->data;
    }
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
        $this->file=[
            'name'=>'putanja',
            'directory'=>'uploads/dokumenti',
            'rules'=>null,
            'maxSize'=>null,
            'messages'=>null
        ];
        return $this->file;
    }
    public function getRules()
    {
        return [
            'name'=>'required|min:2|max:60',
//            'putanja'=>'required'
        ];
    }

    public function getModelClass()
    {
        return Dokumenti::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'name.required' => 'Odaberite bar jedano ime',
            'name.min'=>'Ime mora imati minimalno 2 karaktera',
            'name.max'=>'Ime ne moze imati vise od 60 karaktera',
            'putanja.required'=>'Potrebno je uneti zeljenu putanju',
        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno učitan dokument';
    }


}