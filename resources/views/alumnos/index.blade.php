@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<style>
    .listado-busqueda {
  width: 240px;
  float: right;
}
.listado-busqueda input {
  width: calc(100% - 70px);
  display: inline-block;
}
</style>
<div class="main-content">

<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Basic Tables</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                <li class="breadcrumb-item active">Basic Tables</li>
            </ol>
        </div>
    </div>
  </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="card-header align-items-center d-flex">

    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
      <i class="fas fa-plus-circle"></i> Nuevo Registro
    </a>

    <form method="GET" class="listado-busqueda">
      <input type="text" placeholder="Ingrese su búsqueda" name="s" class="form-control input-sm"
          value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
      <button type="submit" class="btn btn-primary"><i class="ri-search-line"></i></button>
    </form>
  </div>

<!-- end page title -->
<div class="col-xl-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Alumnos</h4>
        
    </div><!-- end card header -->

  <div class="card-body">
    <div class="live-preview">
      <div class="table-responsive">
        <table class="table table-striped table-nowrap align-middle mb-0">
          <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Dirección</th>
                <th scope="col">Documento</th>
                <th scope="col">Celular</th>
                <th scope="col">Email</th>
                <th scope="col">Fecha-Creación</th>
                <th scope="col">Fecha-Modificación</th>
            </tr>
          </thead>
            <tbody>
            @foreach ($listados as $unidad)
              <tr>
                <td>{{$unidad->idalumno}}</td>
                <td>{{$unidad->nombre}}</td>
                <td>{{$unidad->apellido}}</td>
                <td>{{$unidad->direccion}}</td>
                <td>{{$unidad->documento}}</td>
                <td>{{$unidad->celular}}</td>
                <td>{{$unidad->email}}</td>
                <td>{{$unidad->fechacrea}}</td>
                <td>{{$unidad->fechamodi}}</td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $unidad->idalumno }}">
                    <i class="fas fa-plus-circle"></i> Editar
                  </a>
                  <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $unidad->idalumno }}">
                    <i class="fas fa-trash-alt"></i> Eliminar
                  </a>
                </td>
              </tr>
            @endforeach 
            </tbody>
        </table>
      </div>
    </div>
  </div><!-- end card -->
</div>
<!-- end col -->
</div>
<!-- end row -->

<!-- Modal para Crear Nuevo Alumno -->
<div class="modal fade bs-example-modal-xl" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('alumnos.store')}}" method="POST" id="agregar-form">
          @csrf
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required
                            placeholder="Ingrese el Nombre">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required
                            placeholder="Ingrese el Apellido">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required
                            placeholder="Ingrese la Dirección">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="documento">Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento" required
                            placeholder="Ingrese la Dirección">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" required
                            placeholder="Ingrese el Celular">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"><br>
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" required
                            placeholder="Ingrese el Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><br>
                        <label for="fechacrea">Fecha de creación</label>
                        <input type="date" class="form-control" id="fechacrea"
                            name="fechacrea">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group"><br>
                        <label for="fechamodi">Fecha de modificación</label>
                        <input type="date" class="form-control" id="fechamodi"
                            name="fechamodi">
                    </div>
                </div>
              </div>
            </div>
          </div><br>
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal para Crear Nuevo Alumno -->

@foreach ($listados as $unidad)
<!-- Modal de Editar -->

<div class="modal fade bs-example-modal-xl" id="editarModal{{ $unidad->idalumno }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $unidad->idalumno }}" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel{{ $unidad->idalumno }}">Editar alumno</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('alumnos.update', $unidad->idalumno) }}" method="POST" id="reservation-form">
          @csrf
          @method('PUT')
          <div class="tab-content">
            <div class="tab-pane fade show active">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group"><br>
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $unidad->nombre }}" required
                            placeholder="Ingrese el Nombre">
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group"><br>
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $unidad->apellido }}" required
                            placeholder="Ingrese el Apellido">
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><br>
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $unidad->direccion }}" required
                                placeholder="Ingrese la Dirección">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><br>
                            <label for="documento">Documento</label>
                            <input type="text" class="form-control" id="documento" name="documento" value="{{ $unidad->documento }}" required
                                placeholder="Ingrese la Dirección">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><br>
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" id="celular" value="{{ $unidad->celular }}" required
                                placeholder="Ingrese el Celular">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><br>
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $unidad->email }}" required
                                placeholder="Ingrese el Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><br>
                            <label for="fechamodi">Fecha de modificación</label>
                            <input type="date" class="form-control" id="fechamodi" 
                                name="fechamodi" value="{{ $unidad->fechamodi }}">
                        </div>
                    </div>
              </div>
            </div>
          </div><br>
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Editar -->
@endforeach

<!-- Eliminar -->
@foreach ($listados as $unidad)
<div class="modal fade" id="eliminarModal{{ $unidad->idalumno }}" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('alumnos.destroy', $unidad->idalumno) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
        setTimeout(function(){
            document.querySelector('.alert').style.display = 'none';
        }, 3000);
</script>

@endsection