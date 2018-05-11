<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medcien;
use App\Http\Requests\MedcienRequest;
use App\User ;

class MedcienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medciens=Medcien::all();
        return view('medcien.index',['medciens' => $medciens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medcien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedcienRequest $request)
    {
        $Users = new  User();
        $Users->name = $request->input('login') ;
        $Users->email = $request->input('email') ;
        $Users->password = bcrypt($request->input('password')) ;
        $Users->role = 3 ;
        $Users->save();

        $medcien=new Medcien();
        $medcien->nom=$request->input('nom');
        $medcien->prenom=$request->input('prenom');
        $medcien->cin=$request->input('cin');
        $medcien->tel=$request->input('tel');
        $medcien->specialite=$request->input('specialite');
        $medcien->user_id=$Users->id;
        $medcien->save();
        session()->flash('successCreate','le medcien a étè bien enrgistre !!') ;
        return redirect('medciens/create');
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
        $medcien=Medcien::find($id);
        return view('medcien.edit',['medcien'=> $medcien ] ) ;
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
        $medcien = Medcien::find($id);
        $medcien->nom=$request->input('nom');
        $medcien->prenom=$request->input('prenom');
        $medcien->cin=$request->input('cin');
        $medcien->tel=$request->input('tel');
        $medcien->specialite=$request->input('specialite');
        $medcien->save();
        session()->flash('successFormModif','le medcien a étè bien Modifer !!') ;
       return redirect('medciens/'.$id.'/edit') ;
    }
    public function userupdate(Request $request, $id){

        $medcien = Medcien::find($id);
        $Users =  User::find($medcien->user_id);

        $mdpuser = $request->input('password_actuel');
        $verifypass = password_verify($mdpuser, $Users->password);
        $this->validate($request, [
  
            'password_actuel' => "required",
            'password_nouveau' => "required|max:255|min:6|same:password_confirmer",
        ]);

        if ($verifypass == true)
        {
           

            $Users->password = bcrypt($request->input('password_nouveau')) ;
            $Users->save();
            session()->flash('successPassword','le Password a étè bien changer !!') ;
            return redirect('medciens/'.$id.'/edit') ;
           
        }else{

            $messages = array(
                'boolean' => 'Verifer votre mot de passe actuel',
            );
            $this->validate($request, [
                'password_actuel' => "boolean:false",
            ],$messages);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $medcien=Medcien::find($id);
        $Users =  User::find($medcien->user_id);
        $Users->delete();
        $medcien->delete();
        session()->flash('successSupp','l etudiant : '.$medcien->nom.'  à été bien supprimée !!!!');
        return redirect('medciens');
    }
}
