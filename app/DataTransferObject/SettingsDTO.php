<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\Settings;
use Illuminate\Http\Request;

class SettingsDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
public $imeSajta;
public $title;
public $adresa;
public $email;
public $telefon;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>SettingsDTO::class,
            'routeName'=>'settings',
            'viewPath'=>'CRUD.settings',
            'naslov'=>'Osnovna podešavanja sajta',
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
            'imeSajta' => 'required|min:2|max:60',
            'title' => 'required|min:2|max:60',
            'email' => 'required|email',
        ];
    }

    public function getModelClass()
    {
        return Settings::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'imeSajta.required'=>'Potrebno je uneti ime sajta',
            'imeSajta.min'=>'Ime Sajta mora imati minimalno 2 karaktera',
            'imeSajta.max'=>'Ime Sajta ne moze imati vise od 60 karaktera',
            'title.required'=>'Potrebno je uneti title sajta',
            'title.min'=>'Title mora imati minimalno 2 karaktera',
            'title.max'=>'Title ne moze imati vise od 60 karaktera',
            'email.required'=>'Potrebno je uneti email',
            'email.email'=>'Nije dobar format emaila',
            'email.unique' => 'Uneti email vec postoji',
            'theme.required'=>'Potrebno je uneti zelejenu theme',
            'theme.numeric'=>'Potrebno je uneti broj za theme'


        ];
        return $greske;
    }

}