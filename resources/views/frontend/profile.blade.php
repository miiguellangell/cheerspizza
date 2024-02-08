@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif


        <div class="bg-white md:mx-auto rounded shadow-xl w-full md:w-1/2 overflow-hidden">
   <div class="header-bg"></div>
   <div class="content">
      <div class="avatar"><img src="{{ asset('imagenes/logo.png') }}" alt="logo Cheers Pizza" class="logo-header"></div>
      <div>
      <h3>Perfil de: {{ $user->name }}</h3>
      <p>Email: {{ $user->email }}</p>
      </div>


      @php
                use App\Models\Setting;

                $showWinnersSetting = Setting::where('key', 'show_winners')->first();
                $showWinners = $showWinnersSetting && $showWinnersSetting->value == '1';
                @endphp

                @if($showWinners)
    {{-- Mensaje para el ganador del primer puesto --}}
    @if($ranking == 1)
        <div style="background-color:#441110; margin-top:0px;" class="card price">
            <div class="card-header">
                Concurso finalizado
            </div>
            <div class="card-body">
                <h5 class="card-title">Felicidades, estás en el puesto {{ $ranking }}. ¡Eres uno de los ganadores!</h5>
                <p style="color:white;" class="card-text">
                    ¡Eres el(a) afortunado(a) ganador(a) del viaje a Santa Marta para 2 personas, 5 días 4 noches!
                    (incluye tiquetes + hotel). Te has hecho merecedor(a) de este premio por ser un fiel amante de
                    la pizza. Estamos felices de poder formar parte de tus momentos especiales.
                    Te estaremos contactando en los próximos 8 días para concretar tu premio, así que debes estar
                    muy pendiente de nuestra llamada. Después de la llamada debes confirmarnos tu asistencia con al
                    menos 45 días de anticipación.
                </p>
            </div>
        </div>
    @elseif($ranking == 2)
        {{-- Mensaje para el ganador del segundo puesto, asumo que quieres un mensaje diferente aquí --}}
        <div style="background-color:#441110; margin-top:0px;" class="card price">
            <div class="card-header">
                Concurso finalizado
            </div>
            <div class="card-body">
                <h5 class="card-title">Felicidades, estás en el puesto {{ $ranking }}. ¡Eres uno de los ganadores!</h5>
                <p style="color:white;" class="card-text">
                ¡Eres el(a) afortunado(a) ganador(a) de dos boletas para ir el Tomorrowland mas los tiquetes de avión! Te has hecho merecedor(a) de este premio por ser un fiel amante de la pizza. Estamos felices de poder formar parte de tus momentos especiales. 
Te estaremos contactando en los próximos 8 días para concretar tu premio, así que debes estar muy pendiente de nuestra llamada. Después de la llamada debes confirmarnos tu asistencia con al menos 15 días de anticipación.

                </p>
            </div>
        </div>
        @elseif($ranking == 3)
        {{-- Mensaje para los ganadores del tercer al décimo puesto --}}
        <div style="background-color:#441110; margin-top:0px;" class="card price">
            <div class="card-header">
                Concurso finalizado
            </div>
            <div class="card-body">
                <h5 class="card-title">Felicidades, estás en el puesto {{ $ranking }}. ¡Eres uno de los ganadores!</h5>
                <p style="color:white;" class="card-text">
                ¡Eres el(a) afortunado(a) ganador(a) del premio de pizzas personales gratis durante un año! (2 pizzas personales gratis por mes. Desde marzo 2023 a marzo 2024). Te has hecho merecedor(a) de este premio por ser un fiel amante de la pizza. Estamos felices de poder formar parte de tus momentos especiales. 
Te estaremos contactando en los próximos 8 días para concretar tu premio, así que debes estar muy pendiente de nuestra llamada.

    @elseif($ranking > 3 && $ranking <= 10)
        {{-- Mensaje para los ganadores del tercer al décimo puesto --}}
        <div style="background-color:#441110; margin-top:0px;" class="card price">
            <div class="card-header">
                Concurso finalizado
            </div>
            <div class="card-body">
                <h5 class="card-title">Felicidades, estás en el puesto {{ $ranking }}. ¡Eres uno de los ganadores!</h5>
                <p style="color:white;" class="card-text">
                ¡Eres el(a) afortunado(a) ganador(a) de una (1) cena gratis para dos (2) personas! La cual, incluye dos (2) platos fuertes, dos (2) bebidas y un (1) postre. ¡Te has hecho merecedor(a) de este premio por ser un fiel amante de la pizza! Estamos felices de poder formar parte de tus momentos especiales. 
Te estaremos contactando en los próximos 8 días para concretar tu premio, así que debes estar muy pendiente de nuestra llamada. 

                </p>
            </div>
        </div>


    @else
        <p>Estás en el puesto {{ $ranking }} de {{ $totalUsers }}. Aunque no estés entre los 10 primeros, tu esfuerzo es muy valioso para nosotros. ¡Sigue participando!</p>
    @endif
@endif


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
    <div style="background-color:#441110; color:white; border-style: solid; place-self: center; padding:10px 10px 10px 10px" class="col">
    <h5><b>PUNTOS ACUMULADOS</b><br> {{ $user->Acumulados }}</h5>
    </div>
  </div>
</div>

    <h4>Facturas cargadas</h4>
         <!-- Repetir este bloque para cada experiencia -->
         <div >
         <table style="word-wrap: break-word;" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th class="tableh" scope="col">#</th>
                        <th class="tableh nfactura" scope="col">#Factura</th>
                        <th class="tableh ppeq" scope="col">Pizzas Pequeñas</th>
                        <th class="tableh pmed" scope="col">Pizzas Medianas</th>
                        <th class="tableh pgra" scope="col">Pizzas Grandes</th>
                        <th class="tableh points" scope="col">Puntos</th>
                        <th class="tableh ops" scope="col">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturas as $factura)
                        <tr>
                            <th class="tableb nrow" scope="row">{{ $loop->iteration }}</th>
                            <td class="tableb nfactura"> {{ $factura->NumeroDeFactura }}</td>
                            <td class="tableb ppeq">{{ $factura->ProductoPeq }}</td>
                            <td class="tableb pmed">{{ $factura->ProductoMed }}</td>
                            <td class="tableb pgra">{{ $factura->ProductoGra }}</td>
                            <td class="tableb points">{{ $factura->PuntosDeFactura }}</td>

                            <td class="tableb ops">
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