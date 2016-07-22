<?php

namespace Corfupaz\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

use Corfupaz\Http\Requests;

use Corfupaz\Http\Requests\UserCreateRequest;
use Corfupaz\Http\Requests\UserUpdateRequest;
use Corfupaz\Http\Controllers\Controller;
use Corfupaz\User;

use Validator;
use Hash;
use Auth;
use Corfupaz\Upload;
use Corfupaz\Comments;



class UsuarioController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function user()
  {
    return view('user.user');
  }

  public function profile()
  {
    return view('user.profile');
  }

  public function updateProfile(Request $request)
  {
    $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('user/profile')->withErrors($validator);
        }
        else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('perfiles', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['perfiles' => 'perfiles/'.$name]);
            return redirect('user')->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }

  }

  public function password()
  {
    return view('user.password');
  }

  public function updatePassword(Request $request)
  {
        $rules = [
          'mypassword' => 'required',
          'password' => 'required|confirmed|min:6|max:18',
      ];

      $messages = [
          'mypassword.required' => 'El campo es requerido',
          'password.required' => 'El campo es requerido',
          'password.confirmed' => 'Las contraseñas no coinciden',
          'password.min' => 'El mínimo permitido son 6 caracteres',
          'password.max' => 'El máximo permitido son 18 caracteres',
      ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if ($validator->fails()){
          return redirect('user/password')->withErrors($validator);
      }
      else{
          if (Hash::check($request->mypassword, Auth::user()->password)){
              $user = new User;
              $user->where('email', '=', Auth::user()->email)
                   ->update(['password' => bcrypt($request->password)]);
              return redirect('user')->with('status', 'Contraseña cambiada con éxito');
          }
          else
          {
              return redirect('user/password')->with('message', 'contraseñas incorrectas ');
          }
      }

  }

  public function comments()
  {
    return view('user.comments');
  }

  public function createComment(Request $request)
  {
    $comment = e($request->comment);
      $date = date('Y-m-d');
      $time = date('H:m:s');
      Comments::insert([

          'comment' => $comment,
          'id_user' => Auth::user()->id,
          'date' => $date,
          'time' => $time,
        ]);

    return redirect('user/comments')->with('status','Comentario publicado');
  }

  public function deleteComment(Request $request)
  {
  $rules = ['id_comment' => 'integer'];
  $validator = Validator::make($request->only('id_comment'), $rules);
  if ($validator->fails()){
      return redirect('user/comments')->with('error', 'Ha ocurrido un error');
  }
  else
  {
    if(Comments::where('id', '=', $request->id_comment)
              ->where('id_user', '=', Auth::user()->id)->delete()
              ){
          return redirect('user/comments')->with('status', 'Comentario eliminado con éxito');
      }
      else{
          return redirect('user/comments')->with('error', 'Ha ocurrido un error');
      }
  }
  }

  public function deleteCommentAdministrator(Request $request)
  {
    $rules = ['id_comment' => 'integer'];
    $validator = Validator::make($request->only('id_comment'), $rules);

    if ($validator->fails()){
        return redirect('user/comments')->with('error', 'Ha ocurrido un error');
    }
    if(Auth::user()->id == 1 && Comments::where('id', '=', $request->id_comment)
            ->where('id', '=', $request->id_comment)->delete()
            ){
        return redirect('user/comments')->with('status', 'Comentario eliminado por el administrador');
    }else {
      return redirect('user/comments')->with('error', 'Ha ocurrido un error administrador');
    }
  }
  public function editComment(Request $request)
  {
      $rules = ['id_comment' => 'integer'];
      $comment = e($request->comment);
      $validator = Validator::make($request->all(), $rules);
      if ($validator->fails()){
          return redirect('user/comments')->with('error', 'Ha ocurrido un error');
      } else{
          if (Comments::where('id', '=', $request->id_comment)
                  ->where('id_user', '=', Auth::user()->id)
                  ->update(['comment' => $comment])){
              return redirect('user/comments')->with('status', 'Comentario editado correctamente');
          }else{
              return redirect('user/comments')->with('error', 'Ha ocurrido un error');
          }
      }
  }

  public function upload()
  {
    return view('user.upload');
  }

  public function uploadImage(Request $request)
  {
    $rules = ['image' => 'required|image|max:2048*2048*1',
              'name' => 'required|min:3|max:56|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
              'age' => 'required',
              'location' => 'required',
              'phone' => 'required',
            ];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
            'name.required' => 'El campo es requerido',
            'name.min' => 'El mínimo de caracteres permitidos son 3',
            'name.max' => 'El máximo de caracteres permitidos son 16',
            'name.regex' => 'Sólo se aceptan letras',
            'age.required' => 'La edad es requerida',
            'location.required' => 'La localidad es requerida',
            'phone.required' => 'El telefono es requerido',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('user/upload')
            ->withErrors($validator);
        }
        else{

            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('imagenes', $name);
            $upload = new Upload;
            $upload->name = $request->name;
            $upload->age = $request->age;
            $upload->location = $request->location;
            $upload->phone = $request->phone;
            $upload->imagenes = ('imagenes/'.$name);
            $upload->realimg = $name;
            $upload->id_user = Auth::user()->id;
            $upload->save();
            return redirect('cultivos')->with('status', 'Imagen subida exitosamente');
        }
  }

  public function deleteImage(Request $request)
  {
    $rules = ['id_upload' => 'integer'];
    $validator = Validator::make($request->only('id_upload'), $rules);
    if ($validator->fails()){
        return redirect('cultivos')->with('error', 'Ha ocurrido un error');
    }
    else
    {
        if(Upload::where('id', '=', $request->id_upload)
                ->where('id_user', '=', Auth::user()->id)->delete()
                ){
            return redirect('cultivos')->with('status', 'Publicación eliminado con éxito');
        }
        else{
            return redirect('cultivos')->with('error', 'Ha ocurrido un error');
        }
    }
  }

  public function deletePost(Request $request)
  {
    $rules = ['id_upload' => 'integer'];
    $validator = Validator::make($request->only('id_upload'), $rules);
    if ($validator->fails()){
        return redirect('cultivos')->with('error', 'Ha ocurrido un error');
    }
    else
    {
        if(Auth::user()->id == 1 && Upload::where('id', '=', $request->id_upload)
                ->where('id', '=', $request->id_upload)->delete()
                ){
            return redirect('cultivos')->with('status', 'Publicación eliminado por el administrador');
        }
        else{
            return redirect('cultivos')->with('error', 'Ha ocurrido un error');
        }
    }
  }

  public function find(Route $route)
  {
    $this->user = User::find($id);
  }

  public function index()
  {
    $users = User::paginate(3);
    return view('/usuario', compact('users'));
  }

  public function create()
  {
    return view('register');
  }

  public function edit($id)
  {
    $user = User::find($id);
    return view('edit', ['user'=>$user]);
  }
  /*  public function store(UserCreateRequest $request)
    {
      //Creo al usuario, bale berga la bida
      User::create($request->all());

      return redirect('usuario')->with('message','Usuario Creado Exitosamente');
    }*/

    public function update($id, UserUpdateRequest $request)
    {
      $user = User::find($id);
      $user->fill($request->all());
      $user->save();

      Session::flash('message','Usuario Editado Correctamente');
      return Redirect::to('/usuario');
    }

    public function destroy($id)
    {
      User::destroy($id);
      Session::flash('message','Usuario Eliminado Correctamente');
      return Redirect::to('/usuario');
    }

}
