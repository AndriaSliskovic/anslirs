<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data['logo']='Laravel';
        $this->data['sadrzaj']='default';
        $this->data['sidebar']='sidebar';
        $this->data['naslov']='naslov';
    }

    public function ajax(Request $request){
        return $request;
    }

    public function index()
    {
        $user=User::all();
        return $user;
    }

//    public function welcome(){
//        return view('FRONT.home');
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admin($id){

        $user=User::find($id);
        dd($user);
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
