<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use Corfupaz\Http\Requests;
use Corfupaz\Http\Requests\LoginRequest;
use Corfupaz\Http\Controllers\Controller;

class LogAdminController extends Controller
{
  public function store(LoginRequest $request)
  {
    if(Auth::attempt(['email' => 'juancamargo93@outlook.com', 'password' => $request['password']]))
    {
      Session::flash('message','Sesion Iniciada');
      return Redirect::to('usuario');
    }
    Session::flash('message-error', 'Solo usuario administrador');
    return Redirect::to('loginadmin');
  }
}
