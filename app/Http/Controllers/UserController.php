<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    protected $table = 'users';

   public function show(){
        $empleados = User::all();
        return view("Empleados.InformacionEmpleado",compact('empleados'));
   }

   public function destroy(){
    $id = request('userID');
    User::destroy($id);
    request()->session()->flash('alert-success', 'Se ha eliminado al usuario!');
    return redirect()->back();
   }

   public function showEmployee(){
    return view('Empleados.Empleados');
   }

   public function update(){
    $exist = User::whereEmail(request('email'))->exists();
    $this->showMessage($exist);
    $user = $this->checkUser($exist);
    $user->save();
    return redirect()->back();
   }

   private function showMessage($exist){
    if ($exist)
        request()->session()->flash('alert-warning', 'El email no se a modificado debido a que ya existia!, los demas cambios se guardaron');
    else
        request()->session()->flash('alert-success', 'Se ha editado al usuario!');
   }

   private function checkUser($exist){
    $user = User::find(request('userID'));
    $email = request('email');
    $name = request('name');
    $rol = request('rol');
    $user->email = ($email==null || $exist ) ? $user->email : $email;
    $user->name = ($name==null) ? $user->name : $name;
    $user->rol = $rol;
    return $user;
   }
}

