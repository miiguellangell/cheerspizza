@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">factura List</div>
            <div class="card-body">
                <a href="{{ route('facturas.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New factura</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">N Factura</th>
                        <th scope="col">Nombre de cliente</th>
                        <th scope="col">Productos Peq</th>
                        <th scope="col">Productos Med</th>
                        <th scope="col">Productos Gra</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturas as $factura)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                           
                            <td>{{ $factura->NombreDeCliente }}</td>
                            <td>{{ $factura->ProductoPeq }}</td>
                            <td>{{ $factura->ProductoMed }}</td>
                            <td>{{ $factura->ProductoGra }}</td>
                            <td>{{ $factura->PuntosDeFactura }}</td>

                            <td>
                                <form action="{{ route('facturas.destroy', $factura->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('facturas.show', $factura->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Mostrar</a>

                                    <a href="{{ route('facturas.edit', $factura->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que quiere borrar esta factura?');"><i class="bi bi-trash"></i> Borrar</button>
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

                  {{ $facturas->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection