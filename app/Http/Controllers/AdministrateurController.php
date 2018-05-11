<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrateur ;
use App\Http\Requests\AdministrateurRequest ;
use App\User;
use App\Http\Requests\AdministrateurFormRequest ;


class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAdministrateur = Administrateur::all();
        return view('Administrateur.index' ,['Administrateurlist'=> $listAdministrateur ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrateur.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministrateurRequest $request)
    {
        $Users = new  User();
        $Users->name = $request->input('name') ;
        $Users->email = $request->input('email') ;
        $Users->password = bcrypt($request->input('password')) ;
        $Users->role = 0 ;
        $Users->save();
 
        $Administrateur = new Administrateur();
        $Administrateur->nom = $request->input('nom') ;
        $Administrateur->prenom = $request->input('prenom') ;
        $Administrateur->photo = 'img/profile_small.jpg' ; 
        $Administrateur->role = $request->input('role') ;
        $Administrateur->user_id = $Users->id ;
        $Administrateur->save();

      
       session()->flash('successCreate','l\'administrateurs a étè bien enrgistre !!') ;
      return redirect('administrateurs/create') ;
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
        $Administrateur = Administrateur::find($id);
        return view('Administrateur.edit',['administrateur'=> $Administrateur ] ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministrateurFormRequest $request, $id)
    {
        $Administrateur = Administrateur::find($id);
        $Administrateur->nom = $request->input('nom') ;
        $Administrateur->prenom = $request->input('prenom') ;
        $Administrateur->role = $request->input('role') ;
        $Administrateur->save();

        session()->flash('successFormModif','les informations a étè bien changer !!') ;
       return redirect('administrateurs/'.$id.'/edit') ;
    }


    public function userupdate(Request $request ,$id)
    {
        $Administrateur = Administrateur::find($id);
        $Users =  User::find($Administrateur->user_id);

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
            return redirect('administrateurs/'.$id.'/edit') ;
           
        }else{
            $messages = array(
                'boolean' => 'Verifer votre mot de passe actuel',
            );
            $this->validate($request, [
                'password_actuel' => "boolean:false",
            ],$messages);
        }
        //dd($request->all()); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $administrateur = Administrateur::find($id);
        $Users =  User::find($administrateur->user_id);
 
        $Users->delete();
        $administrateur->delete();
        session()->flash('successSupp','l\'administrateur a étè bien supprimeé !!') ;
        return redirect('administrateurs') ;
    }
}
