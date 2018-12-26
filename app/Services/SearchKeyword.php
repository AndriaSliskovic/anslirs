<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 10.04.2018.
 * Time: 19.11
 */

namespace App\Services;

use Illuminate\Http\Request;

class searchKeyword
{
    //public $niz=array();
    public static  function searchByKeyword($keyword, $paginiraj = false,$model,$kolone)
    {
        $niz=array();
        //dd($niz);
        try{
            if(sizeof($kolone)>1){
                for ($x = 1; $x < sizeof($kolone); $x++) {
                    $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%")
                        ->orWhere($kolone[$x], 'like', '%' . $keyword . "%");
                    array_push($niz,$upit);
                    //$niz[]=$upit;
                }
            }   else{
                $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%");
            }
            /*$upit1=collect($niz);
            dd($upit1);*/
            return $paginiraj ? $upit->paginate(3) : $upit->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public static  function searchByKeywordBy1Col($keyword, $paginiraj = false,$model,$kolone)
    {
        try{
            $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%");
            return $paginiraj ? $upit->paginate(3) : $upit->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public static  function searchByKeywordBy2Col($keyword, $paginiraj = false,$model,$kolone)
    {
        try{
            $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%")
                ->orWhere($kolone[1], 'like', '%' . $keyword . "%");
            return $paginiraj ? $upit->paginate(3) : $upit->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public static  function searchByKeywordBy3Col($keyword, $paginiraj = false,$model,$kolone)
    {
        try{
            $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%")
                ->orWhere($kolone[1], 'like', '%' . $keyword . "%")
                ->orWhere($kolone[2], 'like', '%' . $keyword . "%");
            return $paginiraj ? $upit->paginate(3) : $upit->get();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }

}