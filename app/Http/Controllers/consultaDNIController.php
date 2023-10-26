<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DNI;

class consultaDNIController extends Controller
{
  public function consultardocumentoDni(Request $request)
  {
      $dni = $request->input('dni');
      $data = null; // Inicializamos $data en caso de no hacer una consulta

      // Realizar la consulta del DNI si se ha enviado el formulario con el número de DNI
      if ($request->has('dni')) {
          $response = Http::timeout(20)->get('https://api.apis.net.pe/v1/dni', [
              'numero' => $dni,
              'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
          ]);

          $data = $response->json();
           // Verificar si se ha realizado una consulta válida
          if (!empty($data)) {
            // Almacenar los detalles de la consulta en la tabla 'dni_consultations'
            DNI::create([
              'nombres' => $data['nombres'],
              'apellido_paterno' => $data['apellidoPaterno'],
              'apellido_materno' => $data['apellidoMaterno'],
              'numero_documento' => $data['numeroDocumento'],
            ]);
        }
      } 

      return view('consultas.dni', compact('data'));
  }
}
