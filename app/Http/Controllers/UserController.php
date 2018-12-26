<?php

namespace App\Http\Controllers;


use App\DataTransferObject\ProfileDTO;
use App\DataTransferObject\UserDTO;
use App\Services\ModelManager;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Profile;
use App\Services\UploadFile;
use Auth;

class UserController extends Controller
{
    private $data;
    private $instance;
    private $klasa=UserDTO::class;


    public function __construct(Request $request)
    {
        //Svi koji nisu admin mogu pristupiti samo index stranici
        $this->middleware('admin',['except'=>['index']]);
        $this->instance=new ModelManager($request,$this->klasa);
        $this->data=$this->instance->getData($this->klasa);

    }
    public function index()
    {
        //dd('user index view');
        $this->view=$this->data['viewPath'].'.index';
        $this->data['var']=$this->data['model']::all();
        $this->data['sadrzaj']='index';
        //dd(Auth::user()->admin);
        //dd($this->data);
        return view($this->view,
            $this->data
        );
    }

    public function create()
    {   $this->data['user']=\Auth::user();
        $this->view=$this->data['viewPath'].'.create';
        $this->data['sadrzaj']='create';
        return view($this->view,
            $this->data
        );
    }

    //SAMO ADMIN IMA PRAVO DA UNOSI NA OVAJ NACIN NOVE USERE
    public function store(Request $request)
    {
        $menager = new ModelManager($request);
        $var = $menager->createModel($this->data['modelDTO']);
        $var->save();
        if($request->hasFile('avatar')) {
            $menager=new ModelManager($request);
            $menager->createModel(ProfileDTO::class);
            $menager->getImage($request, null, $var,ProfileDTO::class);
            $profile=$menager->getData(ProfileDTO::class);
            $profile=new $profile['model'];
            $profile->user_id=$var->id;
            $profile->avatar=$var->slika;
            $profile->save();
        } else{
            $profile = new Profile();
            $profile->user_id=$var->id;
            $profile->avatar=$this->data['defaultImage'];
            $profile->save();
        }
        Session::flash('success','Uspesno upisani podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function show($id)
    {
        //
    }


    //KORISTI SE ZA IZMENU BILO KOG PROFILA OD STRANE ADMINA,
    //mora request da bi proverio da li postoji profil,
    //Ako ne postoji upisace u proiles samo id korisnika
    public function edit(Request $request, $id)
    {

        $this->view=$this->data['viewPath'].'.edit';
        $this->data['var']=$this->data['model']::find($id);
        //Ako postoji profil
        if(isset($this->data['var']->profile->user_id)){
            $this->data['sadrzaj']='edit';
            //dd($this->data);
            return view($this->view,
                $this->data
            );
        }
        //Pokusaj da upises user_id u profiles
            else{
            //dd("nije setovano");
            try{
                $menager=new ModelManager($request);
                $varProfile = $menager->createModel(ProfileDTO::class);
                $varProfile->user_id=$id;
                $defaultAvatar="uploads/users/default.png";
                $varProfile->avatar=$defaultAvatar;
                $varProfile->avatar=$this->data['defaultImage'];
                $varProfile->save();
                return view($this->view,
                    $this->data
                );
            }catch (\Exception $e){
                //dd("nije usao");
                Session::flash('error','Greska u bazi, obratite se administratoru !');

            }
        }


    }

    public function update(Request $request, $id)
    {
        //Update profila bilo kog usera , koji vrsi samo administrator
        $menager=new ModelManager($request);
        $var = $menager->createModel(ProfileDTO::class);
        $var->user_id=$id;
        //dd($var->user_id);
        $indentifikator=$var->where('user_id',$id)->first()->id;
        //Ovde se mora poslati id od profila a ne od usera
        if($request->hasFile('avatar')) {
            $menager->getImage($request, $indentifikator, $var,ProfileDTO::class);
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
        Profile::where('user_id',$id)
            ->update($updateNiz);
        Session::flash('success','Uspesno promenjeni podaci');
        return redirect()->route($this->data['routeName'].'.index');
    }

    public function destroy($id)
    {
        $var=$this->data['model']::find($id);
        if($var->profile){
            $file = $var->profile->avatar;
            try {
                $var->profile->delete();
                UploadFile::deletePicture($file);
                $var->profile->delete();
            } catch (\Exception $e)
            {
                \Log::error($e->getMessage());
            }
        }
        $var->delete();
        Session::flash('success', 'Uspesno ste obrisali usera');
        return redirect()->back();
    }

    public function admin($id){

        $user=User::find($id);
        $user->admin=1;
        $user->save();
        Session::flash('success','Ovaj user ima administratorsko pravo');
        return redirect()->back();

    }
    public function notAdmin($id){
        $user=User::find($id);
        $user->admin=0;
        $user->save();
        Session::flash('success','Ukinuto je admin pravo');
        return redirect()->back();

    }
}
