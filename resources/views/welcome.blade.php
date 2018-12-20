@extends('admin.template.main')

@section('title')
    Inicio de Pagina
@endsection

@section('content')
    <div class="container">
        
    
        <div class="jumbotron">
            <div class="container">
                <h3 class="text-center">
                Usando Clase Jumbotron! de BootsTrap3 para el Proyecto.
                </h3>
            </div>
            <hr>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-success">Boton</a>    
            </div>        
        </div>
    </div>
@endsection
