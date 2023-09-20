@extends('layouts.app')

{{-- @section('title', 'Bienvenido') --}}

@section('contents')
    <h1 class="mb-0">Detalles del Descuento</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Rentadora</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $brands->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Region</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $regions->code }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $discount->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tipo de Acceso</label>
            <textarea class="form-control" name="accss_type" placeholder="Tipo de acceso" rows="1" style="resize: none;" readonly>{{ $access_types->name }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="active" class="form-control" placeholder="Product Code" value="{{ $discount->active ? 'Activo' : 'Inactivo' }}" readonly>        </div>
            <div class="col mb-3">
                <label class="form-label">Rango de tiempo</label>
                <input type="text" name="rango_de_tiempo" class="form-control" placeholder="Product Code" value="{{ implode(', ', $discount_ranges->pluck('from_days', 'to_days')->map(function ($from, $to) {
                    return "$from - $to";
                })->toArray()) }}" readonly>
            </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">AWD/BCD</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ implode(' - ', $discount_ranges->pluck('code')->toArray()) }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Descuento GSA</label>
            <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ implode('%, ', $discount_ranges->pluck('discount')->toArray()) }}{{ count($discount_ranges) >= 1 ? '%' : '' }}" readonly>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col mb-3">
            <label class="form-label">Periodo de promocion</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" rows="1" style="resize: none;" readonly>{{ substr($discount->start_date, 0, -9) }} / {{ substr($discount->end_date, 0, -9) }}</textarea>
        </div>
        
        <div class="col mb-3">
            <label class="form-label">Prioridad</label>
            <textarea class="form-control" name="description" placeholder="Descriptoin" rows="1" style="resize: none;" readonly>{{ $discount->priority }}</textarea>
        </div>
    </div>
   
@endsection