<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratoire ;
use App\User ;
use App\Http\Requests\laboratoirRequest ;

class LaboratoireController extends Controller
{
    //
    public function index(){
         $listLaboratoire =  Laboratoire::all();
        return view('laboratoire.index' ,['aboratoirelist'=> $listLaboratoire ] );
   
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratoire.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(laboratoirRequest $request)
    {
      
        $Users = new  User();
        $Users->name = $request->input('name') ;
        $Users->email = $request->input('email') ;
        $Users->password = bcrypt($request->input('password')) ;
        $Users->role = 2 ;
        $Users->save();
 
        $laboratoire = new Laboratoire();
        $laboratoire->nom = $request->input('nom') ;
        $laboratoire->email = $request->input('email') ;
        $laboratoire->tel = $request->input('tel') ; 
        $laboratoire->adresse = $request->input('address') ;
        $laboratoire->user_id = $Users->id ;
        $laboratoire->save();

       session()->flash('successCreate','le laboratoire a étè bien enrgistre !!') ;
      return redirect('laboratoires/create') ;
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
       
        $Laboratoire = Laboratoire::find($id);
        return view('Laboratoire.edit',['Laboratoire'=> $Laboratoire ] ) ;
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
        $Laboratoire = Laboratoire::find($id);
        $Laboratoire->nom = $request->input('nom') ;
        $Laboratoire->adresse = $request->input('address') ;
        $Laboratoire->tel = $request->input('tel') ;
        $Laboratoire->save();
        session()->flash('successFormModif','les informations a étè bien changer !!') ;
       return redirect('laboratoires/'.$id.'/edit') ;
    }

    public function userupdate(Request $request ,$id)
    {
        $Laboratoire = Laboratoire::find($id);
        $Users =  User::find($Laboratoire->user_id);

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
            return redirect('laboratoires/'.$id.'/edit') ;
           
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
        $Laboratoire = Laboratoire::find($id);
        $Users =  User::find($Laboratoire->user_id);
 
        $Users->delete();
        $Laboratoire->delete();
        session()->flash('successSupp','le Laboratoire a étè bien supprimeé !!') ;
        return redirect('laboratoires') ;
    }
}
