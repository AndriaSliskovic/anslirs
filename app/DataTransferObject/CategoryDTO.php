<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Category;
use Illuminate\Http\Request;

class CategoryDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $name;
public $oblast_id;
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>CategoryDTO::class,
            'routeName'=>'kategorije',
            'viewPath'=>'CRUD.kategorije',
            'naslov'=>'Podaci o kategorijama',
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
        return Category::class;
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
        return 'Uspesno kreirana kategorija';
    }


}