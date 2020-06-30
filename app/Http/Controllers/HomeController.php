<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(request()->user()->rol=='Administrador'){
            return redirect(route('administrador'));
        }
        else{
            if(request()->user()->rol=='Empleado'){
                return redirect(route('HomeEmpleados'));
            }
            else
                return view('auth/login');
            }
    
        }  
    public function indexAdministrador()
    {
        return view('administrador');
    }

    public function indexEmpleados(){
        return view('HomeEmpleados');
    }
}
