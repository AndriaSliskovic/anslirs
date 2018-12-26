<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Oblast;
use Illuminate\Http\Request;

class OblastDTO extends AbstractDTO
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
            'modelDTO'=>OblastDTO::class,
            'routeName'=>'oblast',
            'viewPath'=>'CRUD.oblast',
            'naslov'=>'Podaci o oblastima',
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
        return Oblast::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'naziv.required' => 'Odaberite bar jednu oblast',
            'naziv.min'=>'Naziv oblasti mora imati minimalno 2 karaktera',
            'naziv.max'=>'Naziv oblasti ne moze imati vise od 60 karaktera',
        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreirana oblast';
    }

}