<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

// use App\Models\DNI;


class consultaDNIController extends Controller
{
  public function index()
  {
      return view('consultas.dni');
  }
  
  public function consultarDNI(Request $request)
  {
      $dni = $request->input('dni');
      $data = null;

      if ($dni) {
          $response = Http::timeout(20)->get('https://api.apis.net.pe/v1/dni', [
              'numero' => $dni,
              'apis-token' => 'apis-token-1301.adsa-82CS1YrzRXRCe',
          ]);

          $data = $response->json();

      }

      return view('consultas.dni', compact('data'));
  }
  
}
