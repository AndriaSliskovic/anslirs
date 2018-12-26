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

class UploadFile
{
    private $file;
    private $fileName;
    private $request;
    public $name = 'dokument';
    public $directory = 'uploads/dokumenti/';
    public $rules = 'required|mimes:pdf';
    public $messages = [
        'dokument.mimes' => 'Nije dobar format, dozovljen je pdf format',
        'dokument.required' => 'Polje za naziv dokumenta je obavezno.'
    ];
    public $maxSize = '2000';
    public $defaultFile="default.pdf";

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

    public function setValues($fajl){
        //dd($slika);
        if(isset($fajl['directory'])){
            $this->setDirectory($fajl['directory']);
        }
        if(isset($fajl['name'])){
            $this->setName($fajl['name']);
        }
        if(isset($fajl['rules'])){
            $this->setRules($fajl['rules']);
        }
        if(isset($fajl['maxSize'])){
            $this->setMaxSize($fajl['maxSize']);
        }
        if(isset($fajl['messages'])){
            $this->setMessages($fajl['messages']);
        }
        if(isset($fajl['default'])){
            $this->defaultFile($fajl['default']);
        }
    }

     public function getFilePath($model, $id){
        $zapis=new $model;
        $name=$this->name;
        $filePath=$zapis->find($id)->$name;
        return $filePath;
    }

    public function validate(){
        $pravila = [
            $this->name => $this->rules
        ];

        $validator = \Validator::make($this->request->all(), $pravila,  $this->messages);
        //dd($pravila,$validator);
        $validator->validate();
    }
//pictureFile
    public function filePath(){
        try {
            if($this->request->hasFile($this->name)) {
                $this->file = $this->request->file($this->name);
                $this->fileName = time() . '_' . $this->file->getClientOriginalName();
                $filePath=$this->directory.'/'.$this->fileName;
                return $filePath;
            } else {
                return null;
            }
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return null;
        }
    }

    public function uploadFile(){
        //Sprecava da se pregazi default fajl (samo u slučaju da se namerno pošalje time().default.pdf, onda bi promenio sve default fajlove za postove )
        if($this->file!==$this->defaultFile){
            $this->file->move($this->directory, $this->fileName);
        } else{
            \Log::error("Pokusaj promene defaultne fajla");
        }
    }

    public function deleteFile($fileName)
    {
        $putanja = public_path($fileName);
        $defaultFile=public_path($this->directory.'/'.$this->defaultFile);

        if(File::exists($putanja)&&$putanja!==$defaultFile) {
            File::delete($putanja);
            return true;
        } else {
            \Log::error("Fajl " . $putanja . " ne postoji.");
            return false;
        }
    }

}