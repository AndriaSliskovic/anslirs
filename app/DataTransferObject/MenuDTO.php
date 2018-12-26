<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Menu;
use Illuminate\Http\Request;

class MenuDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $name;
public $putanja;
public $oblast_id;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>MenuDTO::class,
            'routeName'=>'menu',
            'viewPath'=>'CRUD.menu',
            'naslov'=>'Glavni meni',
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
            'putanja'=>'required'
        ];
    }

    public function getModelClass()
    {
        return Menu::class;
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
        return 'Uspesno kreiran Meni';
    }


}