<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use Validator;
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

    public function send(Request $request)
    {

       $rules = [
            'name' => 'required|min:3|max:56|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'email' => 'required|email|max:50|',
            'subject' => 'required|min:3|max:56|',
            'mensaje' => 'required|min:5|max:255|',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El mínimo de caracteres permitidos son 3',
            'name.max' => 'El máximo de caracteres permitidos son 16',
            'name.regex' => 'Sólo se aceptan letras',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El máximo de caracteres permitidos son 255',
            'subject.required' => 'El campo asunto es requerido',
            'subject.min' => 'El mínimo de caracteres permitidos son 3',
            'subject.max' => 'El máximo de caracteres permitidos son 56',
            'mensaje.required' => 'El campo mensaje es requerido',
            'mensaje.min' => 'El mínimo de caracteres permitidos son 3',
            'mensaje.max' => 'El máximo de caracteres permitidos son 255',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails())
            {
              return redirect("/contacto")
              ->withErrors($validator)
              ->withInput();
           }else
           {
              $emails = ['admin@corfupaz.org', 'juandavidcamargo93@gmail.com','proyectodevida@corfupaz.org'];
              Mail::send('emails.message', $request->all(), function($msj) use ($emails)
              {
                $msj->subject('Correo de contacto Corfupaz.org');
                /*$msj->to('admin@corfupaz.org', 'juandavidcamargo93@gmail.com', 'proyectodevida@corfupaz.org');*/
                foreach ($emails as $email) {
                  $msj->to($email);
                }
              });
              return redirect("/contacto")
            ->with("status", "Mensaje enviado correctamente");
           }
    }
}
