<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Section;
use Illuminate\Http\Request;

class SectionDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    public $sec_id;
    public $naslov;
    public $podnaslov;
    public $sadrzaj;
    public $slika;
    public $link;


    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>SectionDTO::class,
            'routeName'=>'section',
            'viewPath'=>'CRUD.section',
            'naslov'=>'Odabrana sekcija',
            'defaultImage'=>'uploads/section/default.png',
        ];
        return $this->data;
    }
    public function dtoImage(){
        $this->image=[
            'name'=>'slika',
            'directory'=>'uploads/section',
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
        ];
    }

    public function getModelClass()
    {
        return Section::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'naslov.required' => 'Odaberite bar jedanu naslov',
            'naslov.min'=>'naslov mora imati minimalno 2 karaktera',
            'naslov.max'=>'naslov ne moze imati vise od 60 karaktera',
        ];
        return $greske;
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran Section';
    }


}