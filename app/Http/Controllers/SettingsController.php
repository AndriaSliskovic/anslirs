<?php

namespace App\Http\Controllers;

use App\DataTransferObject\SettingsDTO;
use Illuminate\Http\Request;
use App\Services\ModelManager;
use Session;

class SettingsController extends Controller
{
    private $data;
    private $instance;
    private $klasa=SettingsDTO::class;

    //IMA SAMO INDEX VIEW I UPDATE METOD ostali metodi su iskljuceni

    public function __construct(Request $request)
    {
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
    }
    public function index()
    {
        $this->view=$this->data['viewPath'].'.settings';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->data['model']::first();
        $this->data['sadrzaj']='index';
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $menager = new $this->instance($request,$id);
        $var = $menager->createModel($this->data['modelDTO'],$id);
        $var->id=$id;
        $updateNiz=$var->toArray();
        //Mass assignment
        $this->data['model']::where('id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function destroy($id)
    {

    }
}
