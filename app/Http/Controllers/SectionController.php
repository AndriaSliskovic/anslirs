<?php

namespace App\Http\Controllers;


use App\Category;
use App\Section;
use App\DataTransferObject\SectionDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\Repository\AdminRepository;


class SectionController extends Controller
{
    private $data;
    private $instance;
    private $klasa=SectionDTO::class;


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
        $this->data['sectCat']=$this->repository->sections();
        //dd($this->data['sectCat']);
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {
        $this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        $this->data['sectCat']=$this->repository->sectCat();
        return view($this->view,
            $this->data
        );
    }

    public function store(Request $request)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->slika) {
            $this->instance->getImage($request, null, $var,$this->data['modelDTO']);
        }else{
            $var->slika=$this->data['defaultImage'];
        }
        $var->save();
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->repository->selectSection($id);
        $this->data['sadrzaj']='index';
        $this->data['sectCat']=$this->repository->sections();
        //dd($this->data['sectCat']);
        return view($this->view,
            $this->data
        );
    }

    public function edit($id)
    {
        $this->view=$this->data['viewPath'].'.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        $this->data['sectCat']=$this->repository->sectCat($id);
        //dd($this->data['oblast']);
        return view($this->view,
            $this->data
        );
    }

    public function update(Request $request, $id)
    {
        $var = $this->instance->createModel($this->data['modelDTO']);
        if($request->slika) {
            $this->instance->getImage($request, $id, $var,$this->data['modelDTO']);
        } else{
            $var->slika=Section::find($id)->slika;
        }
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
        $var=$this->data['model']::find($id);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali zapis');
        return redirect()->back();
    }
}
