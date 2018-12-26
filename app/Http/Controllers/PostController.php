<?php

namespace App\Http\Controllers;

use App\DataTransferObject\PostDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\Repository\AdminRepository;
use App\Post;

class PostController extends Controller
{
    private $data;
    private $instance;
    private $klasa=PostDTO::class;


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
        $this->data['category']=$this->repository->selectCategory();
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
        if($request->slika) {

            $this->instance->getImage($request, null, $var,$this->data['modelDTO']);

        }else{
            $var->slika=$this->data['defaultImage'];
        }
        $var->save();
        //Ubacivanje u pivot tabelu
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
        $this->view=$this->data['viewPath'].'.index';
        //Ime promenljive koja se salje na view
        $this->data['var']=$this->repository->postOblasts($id);
        //dd($this->data['var']);
        $this->data['sadrzaj']='index';
        $this->data['oblast']=$this->repository->oblasti();
        //dd($this->data['sectCat']);
        return view($this->view,
            $this->data
        );
    }

    public function edit($id)
    {
        $this->view='CRUD.postovi.edit';
        $this->data['var']=$this->data['model']::find($id);
        $this->data['sadrzaj']='edit';
        $this->data['category']=$this->repository->selectCategory();
        $this->data['tip']=$this->repository->selectTip();
        $this->data['user']=$this->repository->selectUser();
        $this->data['oblast']=$this->repository->getOblast($id);

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
            $var->slika=Post::find($id)->slika;
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
        $putanjaSlike=$var->slika;
        //Brisanje fajla slike
        $this->repository->deleteOldPicture($request,$putanjaSlike);
        $var->delete();
        Session::flash('success','Uspesno ste obrisali zapis');
        return redirect()->back();
    }
}
