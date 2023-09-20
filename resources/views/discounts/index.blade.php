@extends('layouts.app')
  
@section('title', '¡Bievenido Nuevamente!')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Lista de Descuentos</h1>
        <a href="{{ route('discounts.create') }}" class="btn btn-success">Crear descuento</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-success">
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
        <tbody>
            @if($discounts->count() > 0)
                @foreach($discounts as $discount)
                    <tr>
                        <td class="align-middle">

                            @foreach ($brands as $brand )
                            @if ($discount->brand_id === $brand->id)
                                  {{ $brand->name}}
                            @endif
                            @endforeach
    
                        </td>
                        <td class="align-middle">
                     
                       @foreach ( $regions as $region)
                             @if ($region->id === $discount->region_id)
                                {{ $region->code;}}
                             @endif
                         
                       
                       @endforeach
            </td>
                        <td class="align-middle">{{$discount->name}}</td>
                        <td class="align-middle">
                        @foreach($access_types as $access_type)
                            @if ($discount->access_type_code === $access_type->code)
                               {{ $access_type->name}}
                            @endif
                        @endforeach
                                                
                        
                        </td>
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
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td class="align-middle">
                            @if ($discount_range->code)
                                @foreach ($discount_ranges as $discount_range )
                                    @if ($discount_range->discount_id === $discount->id)
                                        {{ $discount_range->code }}
                                        <br>
                                    @endif
                                @endforeach
                            @endif
                        </td>


                       

                        <td class="align-middle">
                            @foreach ($discount_ranges as $discount_range )
                                @if ($discount_range->discount_id === $discount->id)
                                    {{ $discount_range->discount }}%
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td class="align-middle">
                           
                            {{ substr($discount->start_date, 0, -9) }} / {{ substr($discount->end_date, 0, -9) }}
                           
                        </td>

     
                        <td class="align-middle">
                           {{$discount->priority}}
                        </td>
                        <td class="align-middle">
                            <a href="{{ route('discounts.show', $discount->id) }}" type="button" class="btn btn-secondary btn-block">Detail</a>
                            <a href="{{ route('discounts.edit', $discount->id)}}" type="button" class="btn btn-warning btn-block mt-2">Edit</a>
                            <form action="{{ route('discounts.destroy', $discount->id) }}" method="POST" class="mt-2" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </td>
                        
                           
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