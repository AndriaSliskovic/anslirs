<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class AdminController extends Controller
{
    public function index(){
        //dd('admin controller');
        $this->view='CRUD.adminPocetna';
        //dd(\Auth::user());
        $this->data['sadrzaj']='index';
        $this->data['settings']=Settings::first();
        //dd($this->data);
        return view($this->view,$this->data);
    }
}
