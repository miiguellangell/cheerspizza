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
            <div class="card-header"><h1>LISTADO DE PARTICIPANTES</h1></div>
            <div class="card-body">
            <a href="{{ route('clientes.create') }}" class="btn btn-success btn-sm my-2"><i class="fa-solid fa-square-plus"></i> Agregar nuevo participante</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th class="tableh" scope="col">#</th>
                      <th class="tableh" scope="col">Puntos</th>
                        <th class="tableh" scope="col">Nombre de cliente</th>
                        <th class="tableh" scope="col">Teléfono</th>
                        <th class="tableh" scope="col">Correo</th>
                        <th class="tableh" scope="col">Facturas Cargadas</th>
                        <th class="tableh" scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th class="tableb" scope="row">{{ $loop->iteration }}</th>
                            <td class="tableb">{{ $user->Acumulados }}</td>
                            <td class="tableb"> {{ $user->name }}</td>
                            <td class="tableb"> {{ $user->telefono }}</td>
                            <td class="tableb">{{ $user->email }}</td>
                            <td class="tableb">{{ $user->FacturasCargadas }}</td>


                            <td class="tableb">
                                <form action="{{ route('clientes.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="actions">
                                    <a href="{{ route('clientes.show', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-eye"></i>  MOSTRAR</a> 

                                    <a href="{{ route('clientes.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pencil"></i> EDITAR</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Seguro que quiere borrar esta factura?');"><i class="fa-solid fa-trash"></i> BORRAR</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>Usuario no encontrada</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>
            </div>
            <div>
                {{ $users->links() }}
            </div>
        </div>
    </div>    
</div>
    
@endsection