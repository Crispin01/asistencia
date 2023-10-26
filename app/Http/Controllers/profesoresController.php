<?php

namespace App\Http\Controllers;

use App\Models\profesor;
use Illuminate\Http\Request;

class profesoresController extends Controller
{
  public function index()
  { 
    $listados = profesor::query();
        if (!empty($_GET['s'])) {
          $listados = $listados->where('nombre', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('apellido', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('direccion', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('documento', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('email', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('fechacrea', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('fechamodi', 'LIKE', '%'.$_GET['s'].'%')
              ;
    }

    $listados = $listados->get();
    return view('profesores.index', compact('listados'));
  }

  public function store(Request $request)
  {
    profesor::create($request->all());
    return redirect()->back()->with('success', 'Registrado exitosamente');
  }

  public function edit(string $idprofesor)
  {
    $listado = profesor::findOrFail($idprofesor);
    return redirect()->back()->with('success', 'Actualizado exitosamente');
  }
    
  public function update(Request $request, string $idprofesor)
  {
    $listados = profesor::findOrFail($idprofesor);
    $listados->update($request->all());
    return redirect()->back()->with('success', 'Actualizado exitosamente');
  }

  public function destroy(string $idprofesor)
  {
    $listados = profesor::findOrFail($idprofesor);
    $listados->delete();
    return redirect()->back()->with('success', 'Eliminado exitosamente');
  }

}
