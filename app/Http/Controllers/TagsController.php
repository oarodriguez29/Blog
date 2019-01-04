<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Obtener los Tags a listar y pasarlos a la vista 'index'.
        // el metodo search() busca los tags directamente en la BD (scope) => ver modelo 'Tag.php'.
        $tags = Tag::search($request->name)->orderBy('id', 'DESC')->paginate(5);

        // retorno la vista 'index'
        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // retorno la vista 'create'
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        // Metodo para guarar el Tag.
        $tag = new Tag($request->all());
        $tag->save();

        Flash::success('El Tag <b>'.$tag->name.'</b> Ha sido Agregado con Exito!');
        return redirect()->route('admin.tags.index');
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
        // Obtenemos el Tag.
        $tag = Tag::find($id);
        // Retornamos la vista 'edit' pasando los datos.
        return view('admin.tags.edit')->with('tag',$tag);
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
        // Obtengo los Datos de la categoria.
        $tag = Tag::find($id);
        $tag->fill($request->all()); // Metodo Practico para capturar todos los datos.
        $tag->save(); // Guardo los datos en la BD.

        // Mensaje de exito.
        Flash::warning('El Tag <b>'.$tag->name.'</b> ha sido Actualizada con Exito!');
        // retorno a la vista principal 'index'.
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtenemos el tag.
        $tag = Tag::find($id);
        // lo eliminamos.
        $tag->delete();
        // Mensaje de Error Mostrado al Usuario.
        Flash::error('El Tag <b>'.$tag->name.'</b> ha sido Eliminado de Manera Exitosa!');
        return redirect()->route('admin.tags.index'); // Redirecciono a la Vista 'index'.
    }
}
