<?php

namespace App\Http\Controllers;

use App\DataTransferObject\DokumentiDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\Repository\AdminRepository;
use App\Dokumenti;


class DokumentiController extends Controller
{

    private $data;
    private $instance;
    private $klasa=DokumentiDTO::class;

    public function __construct(Request $request)
    {
        //Svi koji nisu admin mogu pristupiti samo index stranici
        $this->middleware('admin',['except'=>['index']]);
        $this->instance=new ModelManager($request);
        $this->data=$this->instance->getData($this->klasa);
        $this->repository= new AdminRepository();
    }
    public function index()
    {   $this->data['user']=\Auth::user();
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->data['model']::all();
//dd($this->data['var']);
        $this->data['sadrzaj']='index';
        $this->data['oblast']=$this->repository->oblasti();
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {
        $this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        $this->data['oblast']=$this->repository->selectOblast();
        $this->data['tip']=$this->repository->selectTip();
        $this->data['user']=$this->repository->selectUser();
        return view($this->view,
            $this->data
        );
    }

    public function store(Request $request)
    {
        //dd($request);
        $var = $this->instance->createModel($this->data['modelDTO']);
        //dd($var);
        if($request->putanja) {
            //dd('imam putanju');
            $this->instance->getFile($request, null, $var,$this->data['modelDTO']);
            //dd('kontroler');
//dd($var->putanja);
        }else{
            $var->putanja=$this->data['defaultImage'];
        }
//dd($var);
        $var->save();
        //Ubacivanje u pivot tabelu
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
//dd($id);
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->repository->dokumentOblasts($id);
//dd($this->data['var']);
        $this->data['sadrzaj']='index';
        $this->data['oblast']=$this->repository->oblasti();
//dd($this->data['oblast']);
        return view($this->view,
            $this->data
        );
    }

    public function edit($id)
    {
        $this->view='CRUD.dokumenti.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        $this->data['oblast']=$this->repository->selectOblast();

        return view($this->view,
            $this->data
        );
    }

    public function update(Request $request, $id)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->putanja) {
            $this->instance->getFile($request, $id, $var,$this->data['modelDTO']);
        } else{
            $var->putanja=Dokumenti::find($id)->putanja;
        }
        $var->id=$id;
        $updateNiz=$var->toArray();
        //Mass assignment
        $this->data['model']::where('id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function destroy(Request $request,$id)
    {
        $var=$this->data['model']::find($id);
        $putanjaFajla=$var->putanja;
        //Brisanje fajla slike
        $this->repository->deleteOldFile($request,$putanjaFajla);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali fajl');
        return redirect()->back();
    }
}
