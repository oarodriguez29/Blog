<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtengo los datos de los Articulos.
        $articles = Article::search($request->title)->orderBy('id','DESC')->paginate(5);
        // Llamando a las Relaciones para los articulos
        $articles->each(function($articles){
            $articles->category; // obtengo la relacion articles/category.
            $articles->user; // obtengo la relacion articles/user.
        });
        // Retorno la Vista 'index'
        return view('admin.articles.index')
            ->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtengo y ordeno las categorias relacionadas al articulo.
        $categories = Category::orderBy('name', 'ASC')->lists('name','id');
        // Obtengo los tags.
        $tags = Tag::orderBy('name', 'ASC')->lists('name','id');
        // retorno la vista 'create'.
        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        // Valido si Capturo el Archivo.
        if ($request->file('image')) {
            // Manipulacion de Imagen.
            $file = $request->file('image');
            // Nombre del archivo.
            $name = 'blog_'.time().'.'.$file->getClientOriginalExtension();
            // Ruta de la Imagen.
            $path = public_path().'/img/articles/';
            $file->move($path, $name);
        }

        // Instancio la variable 'article'.
        $article = new Article($request->all());
        // Capturo el id del usuario logueado.
        $article->user_id = \Auth::user()->id;
        // Guardo el articulo.
        $article->save();

        /* NOTA:
         * Luego de guardar el articulo rellenamos la Tabla Pivot ...
         * llamando la Fn 'tags()' del modelo 'Article' y usando la Fn 'sync()' ...
         * Para rellenar la Tabla Pivot.
        */
        $article->tags()->sync($request->tags);

        // Instancio la variable 'image'.
        $image = new Image();
        // capturo el name de la imagen.
        $image->name = $name;
        // llamo a la Fn 'article()' del modelo 'Image' y asocio o relaciono ...
        // la imagen con el articulo, usando la Fn 'associate()'
        $image->article()->associate($article);
        // guardo la imagen.
        $image->save();
        // Mensaje a Mostrar.
        Flash::success('Se ha Creado el Articulo <b>"'.$article->title.'"</b> de Forma Satisfactoria!');
        // Redireccionamiento a la Vista 'admin.articles.index'
        return redirect()->route('admin.articles.index');

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
        // Obtengo el articulo.
        $article = Article::find($id);
        // Obtengo la relacion entre articulos / categorias.
        $article->category; // (ver Fn's del modelo 'Article').
        // Obtengo la Relacion entre articulos / tags en forma de array.
        /*
         * NOTA: para Obtener los tags y pasarlos a la vista, se necesita 
         * convertirlo en array y esto se logra primero usando la Fn 'list()'
         * para capturar solo el campo que se necesita (este caso el id) y
         * luego con la Fn 'ToArray()' transformamos la coleccion en un simple
         * Array y listo podemos pasar la variable 'array_tags' a la vista.
        */
        $array_tags = $article->tags->lists('id')->ToArray(); // (ver Fn's del modelo 'Article').

        // Obtengo los datos de la categoria para pasarlos a la vista.
        $categories = Category::orderBy('name','ASC')
            ->lists('name','id'); // Fn 'lists()' = crea arreglo del objeto 'Category::'.
        $tags = Tag::orderBy('name','ASC')
            ->lists('name','id'); // Fn 'lists()' = crea arreglo del objeto 'Tag::'.
        // Retorno la Vista 'edit'.
        return view('admin.articles.edit')
            ->with('categories', $categories)
            ->with('article',$article)
            ->with('tags',$tags)
            ->with('array_tags',$array_tags);
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
        // Obtengo los datos del articulo.
        $article = Article::find($id);
        // Metodo Practico para capturar todos los datos del articulo.
        $article->fill($request->all());
        // Guardo datos en la BD.
        $article->save();

        /* NOTA:
         * Luego de guardar el articulo rellenamos la Tabla Pivot ...
         * llamando la Fn 'tags()' del modelo 'Article' y usando la Fn 'sync()' ...
         * Para rellenar la Tabla Pivot.
        */
        $article->tags()->sync($request->tags);

        // Mensaje de exito.
        Flash::warning('El Articulo <b>'.$article->title.'</b> ha sido Actualizado con Exito!');
        // retorno a la vista principal 'index'.
        return redirect()->route('admin.articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtenemos el articulo.
        $article = Article::find($id);
        // lo eliminamos.
        $article->delete();
        // Mensaje de Error Mostrado al Usuario.
        Flash::error('El Articulo <b> '.$article->title.'</b> ha sido Eliminado de Manera Exitosa!');
        return redirect()->route('admin.articles.index'); // Redirecciono a la Vista 'index'.
    }
}
