@extends('layouts.app-for-forms')
  
@section('title', 'Create Discount')
  
@section('contents')
    <h1 class="mb-4">Crear Descuento</h1>
    <hr />

    <form action="{{ route('discounts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la regla</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre de regla">
        </div>

    

        <div class="mb-3">
            <label for="brand" class="form-label">Rentadora</label>
            <select name="brand" class="form-select" id="brand">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <select name="region" class="form-select" id="region">
                @foreach ($regions as $region)
                    <option value="{{ $region->name }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="access_type" class="form-label">Tipo de acceso</label>
            <select name="access_type" class="form-select" id="access_type">
                @foreach ($access_types as $type)
                    <option value="{{ $type->code }}">{{ $type->code }}</option>
                @endforeach
            </select>
        </div>

        

        <div class="mb-3">
            <label for="numeric_field" class="form-label">Prioridad</label>
            <input type="number" name="priority" class="form-control" id="numeric_field" placeholder="Prioridad" min="1" max="1000">
        </div>
        



        <div class="mb-3">
            <label for="start_date" class="form-label">Inicio</label>
            <input type="text" name="start_date" class="form-control datepicker" id="start_date" placeholder="Selecciona una fecha">
        </div>
        

        <div class="mb-3">
            <label for="end_date" class="form-label">Cierre</label>
            <input type="text" name="end_date" class="form-control datepicker" id="end_date" placeholder="Selecciona una fecha">
        </div>
        
      

       <!-- Grupo 1 -->
<div class="mb-3" id="group1">
    <label for="field1a" class="form-label">Periodo de aplicacion 1</label>
    <input type="number" name="field1a" class="form-control" id="field1a" placeholder="Número 1" min="0">
    <input type="number" name="field1b" class="form-control" id="field1b" placeholder="Número 2" min="0">
    <input type="text" name="awd1" class="form-control" id="awd1" placeholder="Código AWD">
    <input type="number" name="percentage1" class="form-control" id="percentage1" placeholder="Valor porcentual (opcional)">
</div>

<!-- Grupo 2 -->
<div class="mb-3" id="group2">
    <label for="field2a" class="form-label">Periodo de aplicacion 2</label>
    <input type="number" name="field2a" class="form-control" id="field2a" placeholder="Número 1" min="0" disabled>
    <input type="number" name="field2b" class="form-control" id="field2b" placeholder="Número 2" min="0" disabled>
    <input type="text" name="awd2" class="form-control" id="awd2" placeholder="Código AWD">
    <input type="number" name="percentage2" class="form-control" id="percentage2" placeholder="Valor porcentual (opcional)">
</div>

<!-- Grupo 3 -->
<div class="mb-3" id="group3">
    <label for="field3a" class="form-label">Periodo de aplicacion 3</label>
    <input type="number" name="field3a" class="form-control" id="field3a" placeholder="Número 1" min="0" disabled>
    <input type="number" name="field3b" class="form-control" id="field3b" placeholder="Número 2" min="0" disabled>
    <input type="text" name="awd3" class="form-control" id="awd3" placeholder="Código AWD">
    <input type="number" name="percentage3" class="form-control" id="percentage3" placeholder="Valor porcentual (opcional)">
</div>

        <div class="mb-3">
            <label for="active" class="form-label">Estado de regla</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                <label class="form-check-label" for="estado_regla">Activo o Inactivo</label>
            </div>
        </div>
        

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   <!-- Tu código HTML anterior -->

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    
    
    
@endsection
