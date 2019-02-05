<?php

namespace App\Repository;

use App\Dokumenti;
use App\Post;
use App\Category;
use App\Oblast;
use App\Tipovi;
use App\Section;
use App\Menu;
use App\Settings;


class FrontRepository
{
    private $data;

    public function settings(){
        return Settings::first();
    }

    public function sviPostovi(){
        return Post::all();
    }
    public function sviDokumenti(){
        return Dokumenti::all();
    }

    public function postoviPoOblasti($idOblast,$pag){
//        dd(Oblast::find($idOblast)->posts()->count());
//        dd(Oblast::find($idOblast)->posts());
        //!!!--Mora se definisati post() a ne ->post ,
        // da bi se dobio objekat koji se moze paginirati
        $postovi=Oblast::find($idOblast)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
//        dd($postovi);
        return $postovi;
    }

    public function postoviPoTipu($idTip,$pag){
        //!!!--Mora se definisati post() a ne ->post ,
        // da bi se dobio objekat koji se moze paginirati
        $postovi=Oblast::find($idTip)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
        return $postovi;
    }

    public function postoviPoSkillu($skill,$pag){
        return Post::where('skill',$skill)->orderBy('vremeIzrade','decs')->paginate($pag);
    }

    public function kategorijePostova(){
        $kategorije=Category::with('posts')->get();
        return $kategorije;
    }

    public function postoviPoKategoriji($idKat,$pag){
        $postovi=Category::find($idKat)->posts()
            ->orderBy('vremeIzrade', 'desc')
            ->paginate($pag);
        return $postovi;
    }

    public function odabranaKategorija($id){
        $kategorija=Category::find($id)->name;
        return $kategorija;
    }

    public function postoviOblast($id){
        $this->data['posts']=Oblast::find($id)->posts;
        $this->data['categorys']=Oblast::find($id)->categories;
        return $this->data;
    }

    public function menu(){
        $menu=Menu::all();
        return $menu;
    }

    public function paginatePosts(){
        $posts=Post::orderBy('skill','decs')->paginate(3);
        return $posts;
    }

    public static function findBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public function carusel($secID){
        return Section::where('sec_id',$secID)->get();
    }

    public function proizvodi($idCatSec){
        return Section::where('sec_id',$idCatSec)->get();
    }

    public function section($idCatSec){
        return Section::where('sec_id',$idCatSec)->first();
    }


    public function kategorije($slug){
        $post=Post::where('slug', $slug)->first();
        $kategorija=$post->category->name;
        return $kategorija;
    }
    public  function oblastProjekta($slug){
        $post=Post::where('slug', $slug)->first();
        $oblastId=$post->category->oblast->id;
        return $oblastId;
    }

    public static function searchKeyword($request,$model,$keyword){
        //dd($request);
        $kolone=['naslov','sadrzaj','podnaslov'];
        $niz=array();
        if(sizeof($kolone)>1){
            for ($x = 1; $x < sizeof($kolone); $x++) {
                $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%")
                    ->orWhere($kolone[$x], 'like', '%' . $keyword . "%")->get();
                array_push($niz,$upit);
                //$niz[]=$upit;

            }
        }   else{
            $upit = $model::where($kolone[0], 'like', '%' . $keyword . "%");
        }
        return $upit;
    }

    public function oblastProjects($id){
        return Oblast::find($id)->projekti;
    }

    public function oblastCategories($id){
        return Oblast::find($id)->categories;
    }

    public function projektiPoKategoriji($id){
        return Category::find($id)->projekti;
    }

    public function kategorijaPosta($id){
        return Category::find($id);
    }

    public function odabranaOblast($id){
        return Oblast::find($id)->name;
    }

    public function redirectToUrl($url){
        return redirect()->away($url);
    }


}