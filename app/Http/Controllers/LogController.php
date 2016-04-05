<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use Corfupaz\Http\Requests;
use Corfupaz\Http\Requests\LoginRequest;
use Corfupaz\Http\Controllers\Controller;

class LogController extends Controller
{
    public function store(LoginRequest $request)
    {
    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
    	{
    		Session::flash('message','Sesion Iniciada');
    		return Redirect::to('productos');
    	}

    	Session::flash('message-error', 'Datos Incorrectos');
    	return Redirect::to('login');
    }

    

    public function logout()
    {
      Auth::logout();
      return Redirect::to('index');
    }
}
