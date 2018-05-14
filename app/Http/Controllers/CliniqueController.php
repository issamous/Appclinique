<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Clinique ;
use App\Http\Requests\cliniqueRequest ;
use App\Http\Requests\cliniqueFormRequest ;
use App\User ;

class CliniqueController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
        $this->middleware('clinique');

        /*$this->middleware(function ($request, $next) {
            $this->user= Auth::user();
            $this->user->role
            return $next($request);
        });*/

       // $this->middleware('log')->only('index');

       // $this->middleware('subscribed')->except('store');
       /* $this->middleware(function ($request, $next) {
            $this->user= Auth::user();
    
            return $next($request);
        });*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listClinique = Clinique::all();

        
        return view('clinique.index' ,['cliniqulist'=> $listClinique ]) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clinique.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cliniqueRequest $request)
    {

        $Users = new  User();
        $Users->name = $request->input('name') ;
        $Users->email = $request->input('email') ;
        $Users->password = bcrypt($request->input('password')) ;
        $Users->role = 1 ;
        $Users->save();
 
        $Clinique = new Clinique();
        $Clinique->nom = $request->input('nom') ;
        $Clinique->email = $request->input('email') ;
        $Clinique->tel = $request->input('tel') ; 
        $Clinique->adresse = $request->input('address') ;
        $Clinique->user_id = $Users->id ;
        $Clinique->save();

       session()->flash('successCreate','le clinique a étè bien enrgistre !!') ;
      return redirect('cliniques/create') ;
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
       
        $Clinique = Clinique::find($id);
        return view('clinique.edit',['clinique'=> $Clinique ] ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(cliniqueFormRequest $request ,$id)
    {
        $clinique = Clinique::find($id);
        $clinique->nom = $request->input('nom') ;
        $clinique->adresse = $request->input('address') ;
        $clinique->tel = $request->input('tel') ;
        $clinique->save();

        session()->flash('successFormModif','les informations a étè bien changer !!') ;
       return redirect('cliniques/'.$id.'/edit') ;
    }

    public function userupdate(Request $request ,$id)
    {
        $clinique = Clinique::find($id);
        $Users =  User::find($clinique->user_id);

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
            return redirect('cliniques/'.$id.'/edit') ;
           
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

    public function updatePass(Request $request ,$id)
    {
        $clinique = Clinique::find($id);
        $Users =  User::find($clinique->user_id);


    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {

       $clinique = Clinique::find($id);
       $Users =  User::find($clinique->user_id);

       $Users->delete();
       $clinique->delete();
       session()->flash('successSupp','le clinique a étè bien supprimeé !!') ;
       return redirect('cliniques') ;
       
    }
}
