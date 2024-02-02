@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
             <div class="bg-white md:mx-auto rounded shadow-xl w-full md:w-1/2 overflow-hidden">
                <div class="header-bg"></div>
                     <div class="content">

      <div class="avatar"><img src="{{ asset('imagenes/logo.png') }}" alt="logo Cheers Pizza" class="logo-header"></div>
<div>
      <h3>Perfil de: {{ $user->name }}</h3>
        <p>Email: {{ $user->email }}</p>
      </div>
<div style="display:flex;">      
        <div class="buttons"> 
  </div> 
      <div>
        </div>
    </div>

    <div class="container">
  <div class="row">
    <div class="col">
    <a  style="place-self: center; padding:10px 10px 10px 10px" href="{{ route('facturas.create') }}" class="btn btn-success btn-sm my-2"><i class="fa-solid fa-square-plus"></i> AGREGAR NUEVA FACTURA</a>
    </div>
    <div class="col">
    
    </div>
    <div style="background-color:#441110; color:white; border-style: solid; place-self: center; padding:10px 10px 10px 10px" class="col">
    <h5><b>PUNTOS ACUMULADOS :</b><br> {{ $user->Acumulados }}</h5>
    </div>
  </div>
</div>

    <h4>Facturas cargadas</h4>
         <!-- Repetir este bloque para cada experiencia -->
         <div >
         <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th class="tableh" scope="col">#</th>
                        <th class="tableh" scope="col">N Factura</th>
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
                                    <strong>No se han cargado facturas</strong>
                                </span>
                            </td>
                        @endforelse 
                    </tbody>               
                  </table>  
                  {{ $facturas->links() }}                
              <div>          
         </div>
      </div>
   </div>
</div>



    
@endsection