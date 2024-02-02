@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        <div class="index card ">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

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

                            <a href="{{ route('frontend.profile', $user->id) }}" class="btn btn-warning btn-sm"> <i class="fa-solid fa-eye"></i> Ver Perfil</a>
                               
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