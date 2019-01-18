<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 08.02.2018.
 * Time: 10.58
 */

namespace App\Services;


use App\DataTransferObject\AbstractDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ModelManager
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        //dd($this->request);

    }

    public function getData($dtoClass){
        $dto=new $dtoClass($this->request,$dtoClass);
        $dto->setData();
        return $dto->setData();
    }

    public function createModel($dtoClass)
    {
        //Instanca DTO-a koji je poslat iz kontrolera
        $dto = new $dtoClass($this->request);
        //dd($this->request);
        //dd($dto);
        $dto->validate();
        //dd($dto);
        return $this->popuniModelPodacimaIzDto($dto);
    }

    private function popuniModelPodacimaIzDto(AbstractDTO $dto)
    {
        $modelClass = $dto->getModelClass();
        $modelInstance = new $modelClass();
        foreach($dto as $key => $value)
        {
            //Moraju biti isti nazivi name atributa i kolona u bazi
            $modelInstance->$key =$value;
        }
        return $modelInstance;
    }

//Učitavanje slike (ako je ima)
    public function getImage($request,$id,$var,$dtoClass){
        $dto = new $dtoClass($this->request);
//        dd($dto,$id);
        $dto=$dto->getImageAbst($request,$id,$var);
        return $dto;
    }

//Ucitavanje fajla
    public function getFile($request,$id,$var,$dtoClass){
        $dto = new $dtoClass($this->request);
        $dto=$dto->getFileAbst($request,$id,$var);
        return $dto;
    }



}