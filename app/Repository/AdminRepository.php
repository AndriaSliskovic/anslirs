<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 14.03.2018.
 * Time: 13.47
 */

namespace App\Repository;

use App\SectCat;
use App\Section;
use Illuminate\Http\Request;
use App\DataTransferObject\SkillsDTO;
use App\Post;
use App\Category;
use App\Oblast;
use App\Tipovi;
use App\User;
use App\Services\UploadFile;


class AdminRepository
{
    public function selectCategory (){
        $category=Category::all()->pluck('name','id')->toArray();
        return $category;
    }

    public function sectCat(){
        $sectCat=SectCat::all()->pluck('name','id')->toArray();
        return $sectCat;
    }

    public function sections(){
        return SectCat::all();
    }

    public function oblasti(){
        return Oblast::all();
    }

    public function selectSection($id){
        $sekcija=Section::where('sec_id',$id)->get();
        return $sekcija;
    }

    public function postOblasts($idOblast){

        $postovi=Oblast::find($idOblast)->posts()->get();
        //dd($postovi[0]->naslov);
        return $postovi;
    }

    public function dokumentOblasts($idOblast){
//dd('model');
        $postovi=Oblast::find($idOblast)->dokumenti()->get();
        return $postovi;
    }

    public function selectTip (){
        $category=Tipovi::all()->pluck('name','id')->toArray();
        return $category;
    }

    public function selectUser (){
        $category=User::all()->pluck('name','id')->toArray();
        return $category;
    }

    public function selectOblast (){
        $oblast=Oblast::all()->pluck('name','id')->toArray();
        return $oblast;
    }

    public function getCategoryOblast(){
        $oblast=Category::all();
        return $oblast;
    }

    public function getOblast($id){
        //Pristupanje podacima preko posredne tabele one to many
        $oblast=Post::find($id)->category->oblast->name;
        return $oblast;
    }

    public function deleteOldFile(Request $request, $file){
        $delete=new UploadFile($request);
        $delete->deleteFile($file);
    }

}