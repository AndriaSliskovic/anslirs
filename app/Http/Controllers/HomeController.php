<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\FrontRepository;
use App\Repository\AdminRepository;

class HomeController extends Controller
{
    private $repository;
    private $view;
    private $data;
    public function __construct()
    {
        $this->repository=new FrontRepository();
        $this->data['menu']=$this->repository->menu();
        $this->data['settings']=$this->repository->settings();
        $this->data['vazniPostovi']=$this->repository->postoviPoSkillu(5,3);
        $this->data['kategorije']=$this->repository->kategorijePostova();
        $this->data['direktor']=$this->repository->section(5);

    }

    public function index(){
        $this->view='FRONT.home';

        $this->data['carusel']=$this->repository->carusel(1);
        $this->data['knjig']=$this->repository->section(2);
        $this->data['softver']=$this->repository->section(3);
        $this->data['kompanija']=$this->repository->section(4);
        $this->data['opstiPost']=$this->repository->postoviPoOblasti(3,3);
//        dd($this->data['opstiPost']);
        return view($this->view,$this->data);
    }

    public function agencija(){
        $this->view='FRONT.agencija';
        $this->data['settings']->title="Knjigovodstvo ANSLI";
        $this->data['carusel']=$this->repository->carusel(6);
        $this->data['proizvodi']=$this->repository->proizvodi(7);
        $this->data['direktor']=$this->repository->section(10);
        $this->data['post']=$this->repository->postoviPoOblasti(1,4);
        return view($this->view,$this->data);
    }
    public function softver(){
        $this->view='FRONT.agencija';
        $this->data['settings']->title="Softver ANSLI";
        $this->data['carusel']=$this->repository->carusel(8);
        $this->data['proizvodi']=$this->repository->proizvodi(9);
        $this->data['post']=$this->repository->postoviPoOblasti(2,4);
        return view($this->view,$this->data);
    }

    public function vesti(){
        $this->view='FRONT.vesti';
        $this->data['settings']->title="Vesti  ANSLI";
        $this->data['naslov']="Novosti";
        $this->data['post']=$this->repository->postoviPoTipu(2,4);
        return view($this->view,$this->data);
    }

    public function single($slug){
        $this->view='FRONT.single';
        $post=FrontRepository::findBySlug($slug);
        $this->data['post'] = $post;
        $this->data['settings']->title=$post->naslov;
        $this->data['user']=$post->user->find($post->user_id);
        return view($this->view, $this->data);
    }

    public function about(){
        $this->view='FRONT.oNama';
        $this->data['settings']->title="O kompaniji Ansli";
        $this->data['softversadrzaj']=$this->repository->section(11);
        $this->data['softverTim']=$this->repository->carusel(12);
        $this->data['softverSaradnici']=$this->repository->carusel(13);
        $this->data['knjigovodstvoSadrzaj']=$this->repository->section(14);;
        $this->data['knjigovodstvoTim']=$this->repository->carusel(15);
        $this->data['strucniSaradnici']=$this->repository->carusel(16);
        return view($this->view, $this->data);
    }

    public function kontakt(){
        $this->view='FRONT.kontakt';
        $this->data['settings']->title="Kontakt";
        return view($this->view,$this->data);
    }

    public function katPostova($id){
        $this->view='FRONT.vesti';
        $this->data['settings']->title="Kategorije postova";
        $odabranaKategorija=$this->repository->odabranaKategorija($id);
        $this->data['naslov']="Postovi za kategoriju : ".$odabranaKategorija;
        $this->data['post']=$this->repository->postoviPoKategoriji($id,4);
        return view($this->view,$this->data);
    }

    public function download(){
        $this->view='FRONT.dokumenti';
        $this->data['settings']->title="Dokumenti";
        $this->data['dokumenti']=$this->repository->sviDokumenti();
//dd($this->data['dokumenti']);
        $oblast=new AdminRepository();
        $this->data['oblast']=$oblast->oblasti();
//dd($this->data['oblast'])      ;

        return view($this->view,$this->data);
    }

    public function downloadOblast($id){
        $this->view='FRONT.dokumenti';
        $this->data['settings']->title="Dokumenti";
        $oblast=new AdminRepository();
        $this->data['oblast']=$oblast->oblasti();
        $this->data['dokumenti']=$oblast->dokumentOblasts($id);
//dd($this->data['dokumenti']);
        return view($this->view,$this->data);
    }

}
