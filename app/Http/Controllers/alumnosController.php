<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class alumnosController extends Controller
{
    // public function index()
    // {
    // return view( 'alumnos.index' );
    // }

    public function index()
    {
        $listados = alumno::query();
        if (!empty($_GET['s'])) {
          $listados = $listados->where('nombre', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('apellido', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('direccion', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('documento', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('celular', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('email', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('fechacrea', 'LIKE', '%'.$_GET['s'].'%')
              ->orWhere('fechamodi', 'LIKE', '%'.$_GET['s'].'%')
              ;
      }
  
        $listados = $listados->get();
        return view('alumnos.index', compact('listados'));
    }

    public function store(Request $request)
    {
      alumno::create($request->all());
      return redirect()->back()->with('success', 'Registrado exitosamente');
    }

    public function edit(string $idalumno)
    {
      $listado = alumno::findOrFail($idalumno);
      return redirect()->back()->with('success', 'Actualizado exitosamente');
    }

    public function update(Request $request, string $idalumno)
    {
      $listados = alumno::findOrFail($idalumno);
      $listados->update($request->all());
      return redirect()->back()->with('success', 'Actualizado exitosamente');
    }

    public function destroy(string $idalumno)
    {
      $listados = alumno::findOrFail($idalumno);
      $listados->delete();
      return redirect()->back()->with('success', 'Eliminado exitosamente');
    }
}
