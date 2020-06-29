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
        return view('auth/login');
    }

    public function indexAdministrador()
    {
        return view('administrador');
    }

    public function indexEmpleados(){
        return view('HomeEmpleados');
    }
}
