@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="index card ">
            <div class="card-header"><h1>LISTADO DE FACTURAS</h1></div>
            <div class="card-body">
                <a href="{{ route('facturas.create') }}" class="btn btn-success btn-sm my-2"><i class="fa-solid fa-square-plus"></i> AGREGAR NUEVA FACTURA</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th class="tableh" scope="col">#</th>
                        <th class="tableh" scope="col">N Factura</th>
                        <th class="tableh" scope="col">Nombre de cliente</th>
                        <th class="tableh" scope="col">Productos Peq</th>
                        <th class="tableh" scope="col">Productos Med</th>
                        <th class="tableh" scope="col">Productos Gra</th>
                        <th class="tableh" scope="col">Puntos</th>
                        <th class="tableh" scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturas as $factura)
                        <tr>
                            <th class="tableb" scope="row">{{ $loop->iteration }}</th>
                            <td class="tableb"> {{ $factura->NumeroDeFactura }}</td>
                            <td class="tableb"> {{ $factura->user->name }}</td>
                            <td class="tableb">{{ $factura->ProductoPeq }}</td>
                            <td class="tableb">{{ $factura->ProductoMed }}</td>
                            <td class="tableb">{{ $factura->ProductoGra }}</td>
                            <td class="tableb">{{ $factura->PuntosDeFactura }}</td>

                            <td class="tableb">
                                <form action="{{ route('facturas.destroy', $factura->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="actions">
                                    <a  href="{{ route('facturas.show', $factura->id) }}"  class="btn btn-warning btn-sm" title="Ver Factura"><i class="fa-solid fa-eye"></i></a> 

                                    <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-primary btn-sm" title="Editar Factura"><i class="fa-solid fa-pencil"></i></a>   

                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar  Factura" onclick="return confirm('Seguro que quiere borrar esta factura?');"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Factura no encontrada</strong>
                                </span>
                            </td>
                        @endforelse
                   
                    </tbody>
                    
                  </table>
                  <div>
                  {{ $facturas->links() }}
                  </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection