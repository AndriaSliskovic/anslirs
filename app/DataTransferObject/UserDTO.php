<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;


use App\User;
use App\Profile;
use Illuminate\Http\Request;

class UserDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    public $name;
    public $email;
    public $password;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->password=bcrypt($this->password);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>$this->getModelClass(),
            'modelDTO'=>UserDTO::class,
            'routeName'=>'user',
            'viewPath'=>'CRUD.user',
            'naslov'=>'Registrovani useri',
            'defaultImage'=>'uploads/users/default.png',
        ];

        return $this->data;
    }


    //Podaci za sliku
    public function dtoImage(){
        $this->image=[
            'name'=>'avatar',
            'directory'=>'uploads/users',
            'rules'=>null,
            'maxSize'=>null,
            'messages'=>null,
        ];
        return $this->image;
    }
    public function dtoFile(){
        return null;
    }

    public function getRules()
    {
        return [
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
    }

    public function getModelClass()
    {
        return User::class;
    }

    public function getErrorMessages()
    {
        $greske=[
            'name.required'=>'Potrebno je uneti ime',
            'name.min'=>'Ime mora imati minimalno 2 karaktera',
            'name.max'=>'Ime ne moze imati vise od 20 karaktera',
            'email.required'=>'Potrebno je uneti email',
            'email.email'=>'Nije dobar format emaila',
            'password.required'=>'Potrebno je uneti lozinku',
            'password.min'=>'Lozinka mora imati najmanje 6 karaktera',
            'email.unique' => 'Uneti email vec postoji'
        ];
        return $greske;
    }

    public function prosledjeniPodaci()
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),
        ];
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran korisnik';
    }
}