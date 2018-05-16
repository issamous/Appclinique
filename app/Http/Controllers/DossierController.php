<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Laboratoire ;
use App\Patient ;
use App\Medcien ;
use Illuminate\Http\Request;
use App\Http\Requests\DossierRequest ;
use Illuminate\Http\JsonResponse;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDossier =  Dossier::all();
        return view('dossier.index' ,['Dossierlist'=> $listDossier ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $laboratoire=Laboratoire::all();
        $patient=Patient::all();
        $medcien=Medcien::all();

        foreach( $medcien as $item): 
            $medcienTab[] =trim($item->nom) ;  
        endforeach;
        
        return view('dossier.create',["laboratoire" => $laboratoire ,"patient" => $patient,"medcien" => $medcienTab]) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DossierRequest $request)
    {
       dd( $request->all() );
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
