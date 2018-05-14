<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
    //
  public $user ;
  public $table;
  public function __construct(){

    
  }

    public function index()
    {
        
        return view('dashbord');
    }

}
