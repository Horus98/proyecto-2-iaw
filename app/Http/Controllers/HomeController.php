<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->user()->rol=='Administrador'){
            return view('administrador');
        }
        else{
            if(request()->user()->rol=='Empleado'){
                return view('HomeEmpleados');
            }
            else
                return view('auth/login');
            }
        }  
    }

