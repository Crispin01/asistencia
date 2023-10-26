@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

<div class="page-content">
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Listjs</h4>

          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                  <li class="breadcrumb-item active">Listjs</li>
              </ol>
          </div>

        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Profesores</h4>
          </div><!-- end card header -->

          <div class="card-body">
            <div class="listjs-table" id="customerList">
              <div class="row g-4 mb-3">
                <div class="col-sm-auto">
                    <div>
                      <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#agregarModal"><i class="ri-add-line align-bottom me-1"></i> Agregar</button>
                      <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i> Eliminar</button>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="search-box ms-2">
                        <form method="GET" class="listado-busqueda">
                          <input type="text" placeholder="Buscar..." name="s" class="form-control input-sm" value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
                          <i class="ri-search-line search-icon"></i>
                        </form>
                        </div>
                    </div>
                </div>
              </div>

              <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                          <th scope="col" style="width: 50px;">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                            </div>
                          </th>
                          <th class="sort" data-sort="idprofesor">ID</th>
                          <th class="sort" data-sort="nombre">Nombre</th>
                          <th class="sort" data-sort="apellido">Apellido</th>
                          <th class="sort" data-sort="direccion">Dirección</th>
                          <th class="sort" data-sort="documento">Documento</th>
                          <th class="sort" data-sort="telefono">Teléfono</th>
                          <th class="sort" data-sort="email">Email</th>
                          <th class="sort" data-sort="fechacrea">Fecha Creación</th>
                          <th class="sort" data-sort="fechamodi">Fecha Modificación</th>
                          <th class="sort" data-sort="action">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                    @foreach ($listados as $unidad)
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                </div>
                            </th>
                            <td class="idprofesor">{{$unidad->idprofesor}}</td>
                            <td class="nombre">{{$unidad->nombre}}</td>
                            <td class="apellido">{{$unidad->apellido}}</td>
                            <td class="direccion">{{$unidad->direccion}}</td>
                            <td class="documento">{{$unidad->documento}}</td>
                            <td class="telefono">{{$unidad->telefono}}</td>
                            <td class="email">{{$unidad->email}}</td>
                            <td class="fechacrea">{{$unidad->fechacrea}}</td>
                            <td class="fechamodi">{{$unidad->fechamodi}}</td>
                            <td>
                              <div class="d-flex gap-2">
                                <div class="edit">
                                  <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#editarModal{{ $unidad->idprofesor }}">Editar</button>
                                </div>
                                <div class="remove">
                                  <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#eliminarModal{{ $unidad->idprofesor }}">Remover</button>
                                </div>
                              </div>
                            </td>
                        </tr>
                    @endforeach 
                    </tbody>



                </table>
                <div class="noresult" style="display: none">
                    <div class="text-center">
                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                        </lord-icon>
                        <h5 class="mt-2">Sorry! No Result Found</h5>
                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                            orders for you search.</p>
                    </div>
                </div>
              </div>

              <div class="d-flex justify-content-end">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="javascript:void(0);">
                        Next
                    </a>
                </div>
            </div>
            </div>
          </div><!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

<!-- Modal para Crear Nuevo Profesor -->
<div class="modal fade bs-example-modal-xl" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('profesores.store')}}" method="POST" id="agregar-form">
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
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" required
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
          <button type="submit" class="btn btn-success">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal para Crear Nuevo Profesor -->
@foreach ($listados as $unidad)
<!-- Modal de Editar -->
<div class="modal fade bs-example-modal-xl" id="editarModal{{ $unidad->idprofesor }}" tabindex="-1" aria-labelledby="editarModalLabel{{ $unidad->idprofesor }}" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="editarModalLabel{{ $unidad->idprofesor }}">Editar alumno</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('profesores.update', $unidad->idprofesor) }}" method="POST" id="reservation-form">
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
                            <label for="telefono">Celular</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $unidad->telefono }}" required
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
          <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal de Editar -->
@endforeach
<!-- Eliminar -->
@foreach ($listados as $unidad)
<div class="modal fade" id="eliminarModal{{ $unidad->idprofesor }}" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Eliminar Profesor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('profesores.destroy', $unidad->idprofesor) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection