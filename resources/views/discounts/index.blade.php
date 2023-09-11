@extends('layouts.app')
  
@section('title', 'Home discount')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List discount</h1>
        <a href="{{ route('discounts.create') }}" class="btn btn-primary">Add discount</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                     <th>Rentadora</th>
                    <th >Region</th>
                    <th >Nombre</th>
                    <th >Tipo de acceso</th>
                    <th >Estado</th>
                    <th >Periodo</th>
                    <th >AWD/BCD</th>
                    <th >Descuento GSA</th>
                    <th >Periodo de promocion</th>
                    <th >Prioridad</th>
                    <th >Acciones</th>
            </tr>
        </thead>
        <tbody>+
            @if($discounts->count() > 0)
                @foreach($discounts as $discount)
                    <tr>
                        <<td class="align-middle">

                            @foreach ($brands as $brand )
                            @if ($discount->brand_id === $brand->id)
                                  {{ $brand->name}}
                            @endif
                            @endforeach
    
                        </td>
                        <td class="align-middle">{{$discount->region_id}}</td>
                        <td class="align-middle">{{$discount->name}}</td>
                        <td class="align-middle">{{$discount->access_type_code}}</td>
                        <td class="align-middle">
                            @if ( $discount->active === 1)
                                Activo
                            @else 
                                Inactivo
                            @endif
                        </td>
                        <td class="align-middle">
                            @foreach ($discount_ranges as $discount_range )
                                @if ($discount_range->discount_id === $discount->id)
                                    {{ $discount_range->from_days }} - {{ $discount_range->to_days }}
                                @endif
                            @endforeach
                        </td>
                        <td class="align-middle">
                            @if ($discount_range->code)
                                @foreach ($discount_ranges as $discount_range )
                                    @if ($discount_range->discount_id === $discount->id)
                                        {{ $discount_range->code }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td class="align-middle">
                            @foreach ($discount_ranges as $discount_range )
                                @if ($discount_range->discount_id === $discount->id)
                                    {{ $discount_range->discount }}%
                                @endif
                            @endforeach
                        </td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('discounts.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('discounts.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('discounts.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">No hay descuentos</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection