<?php


namespace App\Services;


class CRUDMenager
{
    protected $data;
    protected $klasa;
    protected $instance;

    public function __construct($klasa)
    {
        $this->klasa=$klasa;
        $this->instance=new $this->klasa;
    }

    public function getData(){
        //dd($this->instance->data);
        return $this->instance->data;
    }

    //Učitavanje slike (ako je ima)
    public function getImage($request,$id,$var){
            $upload = new UploadFile($request);
            $slika=$this->instance->image;
            //$upload->setValues($slika);
            $upload->setDirectory($slika['directory']);
            $upload->setName($slika['name']);
            $upload->validate();
            //Fajl nove slike
            $pictureFile=$upload->pictureFile();
            $data=$this->instance->data;
            //Stara putanja fajla upisana u bazi
            $oldPictureName=$upload->getPicturePath($data['model'] , $id);
            //Ako nije uspelo da se upise default slika
            if($pictureFile) {
                //Upisivanje putanje slike
                $var->slika = $pictureFile;
            } else {
                //upisivanje default slike
                $var->slika = $upload->directory.'/'.$upload->defaultFile;
            }
            //Upisivanje u folder slika za postove
            $upload->uploadPicture();
            //Brisanje slike iz public foldera
            $upload->deletePicture($oldPictureName);

    }





}