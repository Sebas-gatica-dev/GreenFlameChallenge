@extends('layouts.app-for-forms')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre de la regla</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $discount->name }}" placeholder="Nombre de regla">
        </div>

    
{{-- 
        <div class="mb-3">
            <label for="brand" class="form-label">Rentadora</label>
            <select name="brand" class="form-select" id="brand">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="brand" class="form-label">Rentadora</label>
            <select name="brand" class="form-select" id="brand">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->name }}" {{ $brand->name == $brand_before->name ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <select name="region" class="form-select" id="region">
                @foreach ($regions as $region)
                    <option value="{{ $region->name }}" {{ $brand->name == $brand_before->name ? 'selected' : '' }}>
                        {{ $region->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="access_type" class="form-label">Tipo de acceso</label>
            <select name="access_type" class="form-select" id="access_type">
                @foreach ($access_types as $type)
                <option value="{{ $type->name }}" {{ $type->code == $access_type_code_before->code ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>              
              @endforeach
            </select>
        </div>

        

        <div class="mb-3">
            <label for="numeric_field" class="form-label">Prioridad</label>
            <input 
                type="number"
                name="priority" 
                class="form-control" 
                id="numeric_field" 
                placeholder="Prioridad" 
                min="1" 
                max="1000"
                value="{{$discount->priority}}" 
                >
        </div>
        



        <div class="mb-3">
            <label for="start_date" class="form-label">Inicio</label>
            <input 
            type="text" 
            name="start_date" 
            class="form-control datepicker" 
            id="start_date" 
            placeholder="Selecciona una fecha"
            value="{{$discount->start_date}}" 
            >
        </div>
        

        <div class="mb-3">
            <label for="end_date" class="form-label">Cierre</label>
            <input 
            type="text" 
            name="end_date" 
            class="form-control datepicker"
            id="end_date" 
            placeholder="Selecciona una fecha"
            value="{{$discount->end_date}}" 
            >
        </div>
        
      
        @for ($i = 1; $i <= 3; $i++)
        <div class="mb-3" name="grpou{{$i}}" id="group{{ $i }}">
            <label for="field{{ $i }}a" class="form-label">Periodo de aplicacion {{ $i }}</label>
            <input
                type="number"
                name="field{{ $i }}a"
                class="form-control"
                id="field{{ $i }}a"
                placeholder="Número 1"
                min="0"
                value="{{ isset($discount_ranges[$i - 1]) ? $discount_ranges[$i - 1]->from_days : '' }}"
            >
            <input
                type="number"
                name="field{{ $i }}b"
                class="form-control"
                id="field{{ $i }}b"
                placeholder="Número 2"
                min="0"
                value="{{ isset($discount_ranges[$i - 1]) ? $discount_ranges[$i - 1]->to_days : '' }}"
            >
            <input
                type="text"
                name="awd{{ $i }}"
                class="form-control"
                id="awd{{ $i }}"
                placeholder="Código AWD"
                value="{{ isset($discount_ranges[$i - 1]) ? $discount_ranges[$i - 1]->code : '' }}"
            >
            <input
                type="number"
                name="percentage{{ $i }}"
                class="form-control"
                id="percentage{{ $i }}"
                placeholder="Valor porcentual (opcional)"
                value="{{ isset($discount_ranges[$i - 1]) ? $discount_ranges[$i - 1]->discount : '' }}"
            >
        </div>
    @endfor
    
    


{{-- AGREGAR EL ATRIBUTO VALUE ON LA LOGICA TERNARIA --}}

{{-- <div class="mb-3" id="group1">
    <label for="field1a" class="form-label">Periodo de aplicacion 1</label>
    <input 
        type="number" 
        name="field1a" 
        class="form-control" 
        id="field1a" 
        placeholder="Número 1" 
        min="0"
    >
    <input 
        type="number" 
        name="field1b" 
        class="form-control" 
        id="field1b" 
        placeholder="Número 2" 
        min="0"
    >
    <input 
        type="text" 
        name="awd1" 
        class="form-control" 
        id="awd1" 
        placeholder="Código AWD"
    >
    <input 
        type="number" 
        name="percentage1" 
        class="form-control" 
        id="percentage1" 
        placeholder="Valor porcentual (opcional)"
    >
</div>

<div class="mb-3" id="group2">
    <label for="field2a" class="form-label">Periodo de aplicacion 2</label>
    <input 
        type="number" 
        name="field2a" 
        class="form-control" 
        id="field2a" 
        placeholder="Número 1" 
        min="0" 
        disabled>
    <input type="number"
        name="field2b" 
        class="form-control" 
        id="field2b" 
        placeholder="Número 2" 
        min="0" 
     >
    <input 
        type="text" 
        name="awd2" 
        class="form-control" 
        id="awd2" 
        placeholder="Código AWD"
    >
    <input 
        type="number" 
        name="percentage2" 
        class="form-control" 
        id="percentage2" 
        placeholder="Valor porcentual (opcional)"
    >
</div>

<div class="mb-3" id="group3">
    <label for="field3a" class="form-label">Periodo de aplicacion 3</label>
    <input 
        type="number" 
        name="field3a" 
        class="form-control" 
        id="field3a" 
        placeholder="Número 1" 
        min="0"
    >
    <input 
        type="number" 
        name="field3b" 
        class="form-control" 
        id="field3b" 
        placeholder="Número 2" 
        min="0" 
        disabled>
    <input 
        type="text" 
        name="awd3" 
        class="form-control" 
        id="awd3" 
        placeholder="Código AWD"
    >
    <input 
        type="number" 
        name="percentage3" 
        class="form-control" 
        id="percentage3" 
        placeholder="Valor porcentual (opcional)"
    >
</div> --}}

        <div class="mb-3">
            <label for="active" class="form-label">Estado de regla</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="active" name="active" value="1">
                <label class="form-check-label" for="estado_regla">Activo o Inactivo</label>
            </div>
        </div>
        

        <div class="mb-3">
            <button id="discountForm" type="submit" class="btn btn-success">Submit</button>
        </div>
        </div>
    </form>
@endsection

{{-- 
<script>
      $(document).ready(function () {
            // Captura el evento de envío del formulario
            $('#discountForm').submit(function (e) {
                // Reorganiza los datos antes de enviarlos
                var formData = $(this).serializeArray();
                var groupedData = {};
                
                $.each(formData, function (i, field) {
                    var parts = field.name.split('.');
                    if (parts.length > 1) {
                        var group = parts[0];
                        var fieldName = parts[1];
                        
                        if (!groupedData[group]) {
                            groupedData[group] = {};
                        }
                        
                        groupedData[group][fieldName] = field.value;
                    }
                });
                
                // Agrega los datos agrupados como objetos JSON al formulario
                $.each(groupedData, function (group, data) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: group,
                        value: JSON.stringify(data)
                    }).appendTo('#discountForm');
                });
            });
        });
</script>

 --}}
