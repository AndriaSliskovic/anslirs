<?php

namespace App\Http\Controllers;


use App\DataTransferObject\ProfileDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Services\ModelManager;
use App\User;
use App\Repository\AdminRepository;

class ProfilesController extends Controller
{
    private $data;
    private $instance;
    private $klasa=ProfileDTO::class;
    private $user;


    public function __construct(Request $request)
    {
        //$this->middleware('admin');
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);
        $this->repository= new AdminRepository();
    }
    public function index($id)
    {

        return view('CRUD.profile.edit')->with('user', $id);
    }

    public function create()
    {
        //IDE PREKO SWICHERA U SHOW METODU
    }

    public function store(Request $request)
    {
        $user=Auth::user();
        $var = $this->instance->createModel($this->data['modelDTO']);
        $var->user_id=$user->id;
        if($request->hasFile('avatar')) {
            $this->instance->getImage($request, null, $var,$this->data['modelDTO']);
            $var->avatar=$var->slika;
            unset($var->slika);
        } else{
            $var->avatar=$this->instance->getData($this->data['modelDTO'])['defaultImage'];
        }
        $var->save();
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.show',['id'=>$user->id]);

    }

    public function show($id)
    {

        $user=Auth::user();
        //dd($user->oblast->name);
        $this->data['user']=$user;
        $this->view=$this->data['viewPath'].'.show';
        //Ukoliko profil postoji prikazi formu edit
        $this->data['var']=$this->data['model']::where('user_id',$user->id)->first();
        //dd($this->data['var']);
        if($this->data['var']){
            $this->data['sadrzaj']='edit';
            return view('CRUD.profile.edit',
                $this->data);
        }
        //Ukoliko ne postoji profil napravi ga-create
        else {
            $this->data['sadrzaj']='create';
            return view('CRUD.profile.create',
                $this->data);
        }
    }

    //KORISTI SE ZA IZMENU PROFILA SAMO LOGOVANOG USERA
    public function edit($id)
    {
       //IDE PREKO SWICHERA U SHOW METODU
    }

    public function update(Request $request)
    {
        //Update profila logovanog usera
        $id=Auth::user()->id;
        $menager=new ModelManager($request);
        $var = $this->instance->createModel($this->data['modelDTO']);
        $user=$this->data['model']::where('user_id',$id)->first();
        //Ako ne postoji profil upisati ga
        if(!$user){
            $var->user_id=$id;
            $var->save();
        }
        $indentifikator=$var->where('user_id',$id)->first()->id;
        if($request->hasFile('avatar')) {
            $menager->getImage($request, $indentifikator, $var,$this->data['modelDTO']);
            //dd($var->slika); //Potrebno je dobiti putanju slike koja je validirana i upisati je u model
            //Setovanje podataka
            $var->avatar=$var->slika;
            unset($var->slika);
        }else{
            //Sprecava da ako se ne odabere slika da ne pregazi staru
            $model=new User();
            $model=$model->find($id);
            $var->avatar=$model->profile->avatar;
        }
        $updateNiz=$var->toArray();
        //Mass assignment
        $this->data['model']::where('id',$user->id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->back();
    }

    public function destroy($id)
    {
       //
    }
}
