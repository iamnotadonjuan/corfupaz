<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;

use Corfupaz\Http\Requests;
use Corfupaz\User;
use Validator;
use Auth;

class AdminController extends Controller
{

  public function __construct(){
    $this->middleware('auth', ['except' => 'createAdmin']);
  }

  private function isAdmin(){
      if (Auth::user()->user == 1) return true;
      else return false;
  }

  public function admin(){
      if ($this->isAdmin()){
          return View('admin.admin');
      } else{
          return redirect()->back();
      }
  }


  public function createAdmin(Request $request){

    if ($request->isMethod('post'))
    {
     //Reglas de validación
     $rules = [
      'name' => 'required|min:3|max:56|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
      'email' => 'required|email|max:255|unique:users,email',
      'password' => 'required|min:6|max:18|confirmed',
     ];

     //Posibles mensajes de error de validación
     $messages = [
      'name.required' => 'El campo es requerido',
      'name.min' => 'El mínimo de caracteres permitidos son 3',
      'name.max' => 'El máximo de caracteres permitidos son 16',
      'name.regex' => 'Sólo se aceptan letras',
      'email.required' => 'El campo es requerido',
      'email.email' => 'El formato de email es incorrecto',
      'email.max' => 'El máximo de caracteres permitidos son 255',
      'email.unique' => 'El email ya existe',
      'password.required' => 'El campo es requerido',
      'password.min' => 'El mínimo de caracteres permitidos son 6',
      'password.max' => 'El máximo de caracteres permitidos son 18',
      'password.confirmed' => 'Los passwords no coinciden',
     ];

     $validator = Validator::make($request->all(), $rules, $messages);

     //Si la validación no es correcta redireccionar al formulario con los errores
     if ($validator->fails()){
      return redirect()->back()->withErrors($validator);
     }
     else{ // De los contrario guardar al usuario
      $user = new User;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->remember_token = str_random(100);
      $user->confirm_token = str_random(100);
      //Activar al administrador sin necesidad de enviar correo electrónico
      $user->active = 0;
      //El valor 1 en la columna determina si el usuario es administrador o no
      $user->user = 1;

      if ($user->save()){
       return redirect()->back()->with('message', 'Administrador creado correctamente');
      } else{
       return redirect()->back()->with('error', 'Ha ocurrido un error al registrar los datos');
      }
     }
    }

    return View('admin.createadmin');
   }
}
