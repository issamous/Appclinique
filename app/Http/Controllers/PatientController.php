<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Patient=Patient::all();
        return view('patient.index',['Patients' => $Patient]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {


        $Patient=new Patient();
        $Patient->nom=$request->input('nom');
        $Patient->prenom=$request->input('prenom');
        $Patient->cin=$request->input('cin');
        $Patient->tel=$request->input('tel');
        $Patient->email=$request->input('email');
        $Patient->age=$request->input('age');
        $Patient->clinique_id= 1 ;
        $Patient->save();
        
        
        session()->flash('successCreate','le Patient a étè bien enrgistre !!') ;
        return redirect('patients/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patients=Patient::find($id);
        return view('patient.edit',['Patient'=> $patients ] ) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $Patient=new Patient();
        $Patient->nom=$request->input('nom');
        $Patient->prenom=$request->input('prenom');
        $Patient->cin=$request->input('cin');
        $Patient->tel=$request->input('tel');
        $Patient->email=$request->input('email');
        $Patient->age=$request->input('age');
        $Patient->clinique_id= 1 ;
        $Patient->save();

        session()->flash('successFormModif','le medcien a étè bien Modifer !!') ;
        return redirect('patients/'.$id.'/edit') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           
        $Patient=Patient::find($id);
        $Patient->delete();
        session()->flash('successSupp','le Patient : '.$Patient->nom.'  à été bien supprimée !!!!');
        return redirect('patients') ;
    }
}
