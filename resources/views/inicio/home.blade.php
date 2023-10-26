@extends('layouts.app')

@section('content')

<H1>BIENVENIDO</H1><br>
<div class="main-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
          <div class="form-group"><br>
              <label for="base_disponible">Base Imp</label>
              <input type="number" class="form-control" id="base_disponible" name="base_disponible">
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group"><br>
              <label for="IGV">IGV</label>
              <select class="form-control" id="IGV" name="IGV">
                  <option value="18">IGV</option>
                  <option value="1.18">IGV INCLUIDO</option>
              </select>
          </div>
      </div>
      <div class="col-md-4">
          <div class="form-group"><br>
              <label for="total">Total</label>
              <input type="number" class="form-control" id="total" name="total">
          </div>
      </div>
    </div>
  </div>
</div>
<script>
    // Obtener elementos del DOM
    const igvSelect = document.getElementById('IGV');
    const baseDisponibleInput = document.getElementById('base_disponible');
    const totalInput = document.getElementById('total');

    // Agregar un evento de cambio al select
    igvSelect.addEventListener('change', calcularTotal);
    
    // Agregar un evento de entrada al campo "base_disponible"
    baseDisponibleInput.addEventListener('input', calcularTotal);

    // Función para calcular el total
    function calcularTotal() {
        const selectedValue = parseFloat(igvSelect.value);
        const baseDisponible = parseFloat(baseDisponibleInput.value);
        let result;

        if (isNaN(baseDisponible)) {
            // Si el usuario no ingresó un número en "base_disponible", el total se establece en 0
            result = 0;
        } else if (selectedValue === 18) {
            // Si se selecciona "IGV" (valor 18), realizar el cálculo
            result = baseDisponible * 0.18;
        } else if (selectedValue === 1.18) {
            // Si se selecciona "IGV INCLUIDO" (valor 1.18), realizar el cálculo
            result = (baseDisponible / 1.18) * 0.18;
        } else {
            // Manejar otras opciones aquí
            result = 0; // Otra opción
        }

        // Mostrar el resultado en el campo "total"
        totalInput.value = result.toFixed(2); // Redondear a 2 decimales
    }
</script>

@endsection