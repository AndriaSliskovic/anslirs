<?php

namespace App\Http\Controllers;

use App\DataTransferObject\TipoviDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\Repository\AdminRepository;

class TipoviController extends Controller
{
    private $data;
    private $instance;
    private $klasa=TipoviDTO::class;

    public function __construct(Request $request)
    {
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
        $this->repository= new AdminRepository();
    }

    public function index()
    {
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->data['model']::all();
        $this->data['sadrzaj']='index';
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {
        $this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        $this->data['oblast']=$this->repository->selectOblast();
        return view($this->view,
            $this->data
        );
    }

    public function store(Request $request)
    {
        $menager = new ModelManager($request);
        $var = $menager->createModel($this->data['modelDTO']);
        $var->save();
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->view=$this->data['viewPath'].'.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        $this->data['oblast']=$this->repository->selectOblast($id);
        //dd($this->data['oblast']);
        return view($this->view,
            $this->data
        );
    }

    public function update(Request $request, $id)
    {
        $menager = new $this->instance($request,$id);
        $var = $menager->createModel($this->data['modelDTO'],$id);
        $var->id=$id;
        $updateNiz=$var->toArray();
        //dd($updateNiz);
        //Mass assignment
        $this->data['model']::where('id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function destroy($id)
    {
        $var=$this->data['model']::find($id);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali zapis');
        return redirect()->back();
    }
}
