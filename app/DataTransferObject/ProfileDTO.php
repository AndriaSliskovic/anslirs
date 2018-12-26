<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.03
 */

namespace App\DataTransferObject;



use App\Profile;
use Illuminate\Http\Request;

class ProfileDTO extends AbstractDTO
{
    // *A - na ovaj nacin preko konstruktora apstr. klase su poslate vrednosti za propertije
    public $avatar;
    public $about;
    public $facebook;
    public $youtube;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->dtoData();
    }

    public function dtoData(){
        $this->data=[
            'model'=>Profile::class,
            'modelDTO'=>ProfileDTO::class,
            'routeName'=>'profile',
            'viewPath'=>'CRUD.profile',
            'naslov'=>'Profil usera',
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

        ];
    }

    public function getModelClass()
    {
        return Profile::class;
    }

    public function getErrorMessages()
    {
        $greske=[

        ];
        return $greske;
    }

    public function prosledjeniPodaci()
    {
        return [
            /*'name'=>$this->name,
            'email'=>$this->email,
            'password'=>bcrypt($this->password),*/
        ];
    }

    public function porukaSuccess(){
        return 'Uspesno kreiran korisnik';
    }
}