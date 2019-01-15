<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard; /* Importo la Clase 'Guard' para usarlo en los metodos... */

class Admin
{
    /* NOTA: Se implementa la Clase 'Guard' con el metodo 'auth' */

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Si el usuario el de tipo admin
        if ($this->auth->user()->Admin()) {
            return $next($request);
        }else{
            abort(401);
            
        }
        
    }
}
