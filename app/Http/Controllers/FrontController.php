<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;

use Corfupaz\Http\Requests;
use Corfupaz\Http\Controllers\Controller;

class FrontController extends Controller
{


    public function index()
    {
        return view('index');
    }

    public function nosotros()
    {
      return view('nosotros');
    }

    public function map()
    {
      return view('map');
    }

    public function download()
    {
      return view('download');
    }

    public function atencion()
    {
      return view('atencion');
    }

    public function contacto()
    {
      return view('contacto');
    }

    public function login()
    {
      return view('login');
    }

    public function register()
    {
      return view('register');
    }

    public function edit()
    {
      return view('edit');
    }

    public function productos()
    {
      return view('productos');
    }

    public function loginadmin()
    {
      return view('loginadmin');
    }

    public function cultivos()
    {
      return view('cultivos');
    }

}
