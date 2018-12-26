<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 10.02.2018.
 * Time: 10.29
 */

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadPicture
{
    private $file;
    private $fileName;
    private $request;
    public $name = 'picture';
    public $directory = 'uploads/pictures/';
    public $rules = 'required|image|mimes:jpg,png,jpeg';
    public $messages = [
        'picture.image' => 'Odabrani fajl nije slika',
        'picture.mimes' => 'Nije dobar format, dozovljeni su jpg i png formati',
        'picture.required' => 'Polje za sliku je obavezno.'
    ];
    public $maxSize = '2000';
    public $defaultFile="default.png";

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function setMaxSize($size)
    {
        $this->maxSize = $size;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function defaultFile($defaultFile){
        $this->defaultFile=public_path($defaultFile);
    }

    public function setValues($slika){
        //dd($slika);
        if(isset($slika['directory'])){
            $this->setDirectory($slika['directory']);
        }
        if(isset($slika['name'])){
            $this->setName($slika['name']);
        }
        if(isset($slika['rules'])){
            $this->setRules($slika['rules']);
        }
        if(isset($slika['maxSize'])){
            $this->setMaxSize($slika['maxSize']);
        }
        if(isset($slika['messages'])){
            $this->setMessages($slika['messages']);
        }
        if(isset($slika['default'])){
            $this->defaultFile($slika['default']);
        }
    }

     public function getPicturePath($model, $id){
        $zapis=new $model;
        $name=$this->name;
        $imagePath=$zapis->find($id)->$name;
        return $imagePath;
    }

    public function validate(){
        $pravila = [
            $this->name => $this->rules
        ];

        $validator = \Validator::make($this->request->all(), $pravila,  $this->messages);
        //dd($pravila,$validator);
        $validator->validate();
    }

    public function pictureFile(){
        try {
            if($this->request->hasFile($this->name)) {
                $this->file = $this->request->file($this->name);
                $this->fileName = time() . '_' . $this->file->getClientOriginalName();
                $pictureFile=$this->directory.'/'.$this->fileName;
                return $pictureFile;
            } else {
                return null;
            }
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return null;
        }
    }

    public function uploadPicture(){
        //Sprecava da se pregazi default slika (samo u slučaju da se namerno pošalje time().default.png, onda bi promenio sve default slike za postove )
        if($this->file!==$this->defaultFile){
            $this->file->move($this->directory, $this->fileName);
        } else{
            \Log::error("Pokusaj promene defaultne slike");
        }
    }

    public function deletePicture($fileName)
    {
        $putanja = public_path($fileName);
        $defaultPicture=public_path($this->directory.'/'.$this->defaultFile);

        if(File::exists($putanja)&&$putanja!==$defaultPicture) {
            File::delete($putanja);
            return true;
        } else {
            \Log::error("Fajl " . $putanja . " ne postoji.");
            return false;
        }
    }

}