<?php 

// Declaramos el namespace.
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View; /* llamamos a los contratos de laravel para Helper View */
use App\Category;
use App\Tag;

// Clase AsideComposer.

class AsideComposer {


	public function compose(View $view)
	{
		/* NOTA: Aca se Obtienen los Datos que Posteriormente pasaremos
		 * a la vista o vistas directamente...
		 */

		// Obtenemos los Datos ordenados.
		$categories = Category::orderBy('name', 'DESC')->get();
		$tags = Tag::orderBy('name', 'DESC')->get();
		// los paso a la vista.
		$view->with('categories', $categories)
			 ->with('tags', $tags);

	}

}