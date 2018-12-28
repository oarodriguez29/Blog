<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ordeno el Listado y Aplico metodo de paginación.
        $users = User::orderBy('id','ASC')->paginate(5);
        // Retorno la Vista "index" pasando los datos.
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());        
        $user->password = bcrypt($request->password);
        $user->save();

        // Agrego Mensaje de respuesta, con el paquete Laracast\Flash...
        //Flash::success('Se ha Registrado <b>'.$user->name.'</b> de Forma Exitosa!');
        flash()->overlay('Se ha Registrado <b>'.$user->name.'</b> de Forma Exitosa!', 'Usuario Registrado!');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtengo el usuario con la busqueda.
        $user = User::find($id);
        // paso los datos a la vista 'edit'.
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Obtengo los Datos del usuario.
        $user = User::find($id);
        $user->fill($request->all()); // Metodo Practico para capturar todos los datos.
        /*$user->name = $request->name; ## equivale al Metodo fill();
        $user->email = $request->email; ## equivale al Metodo fill();
        $user->type = $request->type;*/ ## equivale al Metodo fill();
        $user->save(); // Guardo los datos en la BD.

        // Mensaje de exito.
        Flash::warning('El Usuario <b>'.$user->name.'</b> ha sido Actualizado con Exito!');
        // retorno a la vista principal 'index'.
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // Mensaje de Error Mostrado al Usuario.
        Flash::error('El Usuario <b> '.$user->name.'</b> ha sido Borrado de Manera Exitosa!');
        return redirect()->route('admin.users.index'); // Redirecciono a la Vista 'index'.
    }
}
