<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 01.02.2018.
 * Time: 09.59
 */

namespace App\DataTransferObject;

use App\Services\UploadPicture;
use Illuminate\Http\Request;
use App\Menu;
use App\Settings;
use App\Services\UploadFile;




abstract class AbstractDTO
{

    //Dependency injeciton requesta
    public function __construct(Request $request)
    {
        //Na osnovu requesta u konstruktoru popunjava polja trenutnog objekta za koji je pozvan konstruktor
        //Prolazi se kroz svaki property objekta i ako u request nizu postoji key sa istim imenom, property setuje
        //na tu vrednost
        //dd($this);
        foreach($this as $key => $value) {
            //*A - Ovaj objekat ima property koji je dosao kao key kroz request, i uzima njegovu vrednost
            $this->$key = $request->get($key);
        }
        
    }
    //POCETNO PODESAVANJA SAJTA
    public function setData(){

        $this->data['logo']='Post-Blog';
        $this->data['sadrzaj']='defaultSadrzaj';
        $this->data['sidebar']='sidebar';
        $this->data['settings']=Settings::first();
        $this->data['navBar']=Menu::first();
        //dd($this->data);
        $this->data['route']=['editRoute'=>$this->data['routeName'].'.edit',
            'destroyRoute'=>$this->data['routeName'].'.destroy',
            'createRoute'=>$this->data['routeName'].'.create',
            'storeRoute'=>$this->data['routeName'].'.store',
            'updateRoute'=>$this->data['routeName'].'.update',
            'showRoute'=>$this->data['routeName'].'.show',
        ];
        return $this->data;
    }

    public function validate()
    {
        //Izbacujem data podatke zbog validacije
        unset($this->data);
        $trenutniObjekatKaoNiz = get_object_vars($this);
        $messages=$this->getErrorMessages();
        //Koristimo fasadu koja se nalazi u globalnom namespace-u
        $validator = \Validator::make($trenutniObjekatKaoNiz, $this->getRules(),$messages);
        $validator->validate();
    }

    public function getImageAbst($request,$id,$var){

        $upload = new UploadPicture($request);
        $slika=$this->dtoImage();

        $upload->setValues($slika);

        $upload->validate();

        $pictureFile=$upload->pictureFile();
         $data=$this->dtoData();
        if(isset($id)){
            //Stara putanja fajla upisana u bazi
            $oldPictureName=$upload->getPicturePath($data['model'] , $id);
        }
        //Ako nije uspelo da se upise default slika
        if($pictureFile) {
            //Upisivanje putanje slike u promenljivu
            $var->slika = $pictureFile;
        } else {
            //upisivanje default slike
            $var->slika = $upload->directory.'/'.$upload->defaultFile;
        }
        //Upisivanje u folder slika za postove
        $upload->uploadPicture();
        if(isset($oldPictureName)){
            //Brisanje stare slike iz public foldera
            $upload->deletePicture($oldPictureName);
        }
    }

    public function getFileAbst($request,$id,$var){
        $upload = new UploadFile($request);
        $putanja=$this->dtoFile();
   // dd($putanja);
        $upload->setValues($putanja);
//dd($upload);
        $upload->validate();
//dd($upload);
        $filePath=$upload->filePath();
//dd($filePath) ;
        $data=$this->dtoData();
        if(isset($id)){
            //Stara putanja fajla upisana u bazi
            $oldFileName=$upload->getFilePath($data['model'] , $id);
//dd($oldFileName);
        }
        //Ako nije uspelo da se upise default slika
        if($filePath) {
//dd('ima ga');
            //Upisivanje putanje slike u promenljivu
            $var->putanja = $filePath;
//dd($var);
        } else {
dd('nema fajla');
            //upisivanje default slike
            $var->slika = $upload->directory.'/'.$upload->defaultFile;
dd($var->slika);
        }
//dd('ima upload');
        //Upisivanje u folder slika za postove
        $upload->uploadFile();
        if(isset($oldFileName)){
            //Brisanje stare slike iz public foldera
            $upload->deleteFile($oldFileName);
        }
    }




    public abstract function getRules();
    public abstract function getModelClass();
    public abstract function getErrorMessages();
    public abstract function dtoData();
    public abstract function dtoImage();
    public abstract function dtoFile();
}