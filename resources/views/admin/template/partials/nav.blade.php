    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="{{ route('admin.auth.login') }}" title="Iniciar Sesión!">
            <img alt="{{ (Auth::user()) ? Auth::user()->name : 'foto' }}" width="25" height="25" class="card-img img-circle" src="{{ asset('img/perfil.jpg') }}">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          @if (Auth::user())
            <ul class="nav navbar-nav">
              <li class="active"><a href="{{ route('admin.index') }}">Inicio</a></li>
              <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
              <li><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
              <li><a href="{{ route('admin.articles.index') }}">Articulos</a></li>
              <li><a href="{{ route('admin.images.index') }}">Imagenes</a></li>
              <li><a href="{{ route('admin.tags.index') }}">Tags</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ route('front.index') }}" target="_blank">Pagina Principal</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('admin.auth.logout') }}">Salir</a></li>
                </ul>
              </li>
            </ul>
          @endif
        </div><!--/.nav-collapse -->
      </div>
    </nav>


