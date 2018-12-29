<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Laracasts\Flash\Flash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener Categorias a listar y pasarlas a la vista 'index'.
        $categories = Category::orderBy('id', 'DESC')->paginate(5);

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        $category->save();
        /*msj con alert*/
        Flash::success('La Categoria <b>'.$category->name.'</b> ha sido creada con Exito!');
        /*msj con modal.*/
        //flash()->overlay('La Categoria <b>'.$category->name.'</b> ha sido creada con Exito!');

        return redirect()->route('admin.categories.index');
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
        // Obtenemos la Categoria.
        $category = Category::find($id);
        // Retornamos la vista 'edit' pasando los datos.
        return view('admin.categories.edit')->with('category',$category);
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
        $category = Category::find($id);
        $category->fill($request->all()); // Metodo Practico para capturar todos los datos.
        $category->save(); // Guardo los datos en la BD.

        // Mensaje de exito.
        Flash::warning('La Categoria <b>'.$category->name.'</b> ha sido Actualizada con Exito!');
        // retorno a la vista principal 'index'.
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtenemos la categoria.
        $category = Category::find($id);
        // la eliminamos.
        $category->delete();
        // Mensaje de Error Mostrado al Usuario.
        Flash::error('La Categoria <b> '.$category->name.'</b> ha sido Eliminada de Manera Exitosa!');
        return redirect()->route('admin.categories.index'); // Redirecciono a la Vista 'index'.
    }
}
