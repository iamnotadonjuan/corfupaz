<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;

use Corfupaz\Http\Requests;
use Corfupaz\Http\Controllers\Controller;

class CorfupazController extends Controller
{
    public function index()
    {
        return "Estoy en el index";
    }
    
    public function create()
    {
        return "Este sería el formulario para creaar";
    }
}
