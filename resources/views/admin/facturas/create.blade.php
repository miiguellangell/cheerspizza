@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h1>AÑADIR NUEVA FACTURA</h1>
                </div>
                <div class="float-end">
                    <a style="font-size:15px;" href="{{ route('facturas.index') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-backward"></i> Volver </a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('facturas.store') }}" method="post">
                    @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-solid fa-hashtag fa-xl"></i></span>
                    </div>
                    <input placeholder="Ingresa el numero de factura" type="text" class="form-control @error('NumeroDeFactura') is-invalid @enderror" id="NumeroDeFactura" name="NumeroDeFactura" value="{{ old('NumeroDeFactura') }}">
                    </div> 
                    @if ($errors->has('NumeroDeFactura'))
                       <div> <span class="text-danger">{{ $errors->first('NumeroDeFactura') }}</span></div>
                    @endif

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-user fa-xl"></i> </span>
                    </div>

                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{ old('user_id') }}" >
                    <option value="" disabled selected>Seleccione un cliente</option>
                                    @foreach ($users as $user)                                  
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                       </select>
                </div> 
                <div>
                    @if ($errors->has('user_id'))
                        <span class="text-danger">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>

                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-calendar-days fa-xl"></i> </span>
                    </div>  
                    <input placeholder="Fecha de Compra" type="text" class="form-control @error('FechaDeCarga') is-invalid @enderror" id="FechaDeCarga" name="FechaDeCarga" value="{{ old('FechaDeCarga', $factura->FechaDeCarga ?? '') }}" onfocus="(this.type='date');this.min='2024-02-01';this.max='2024-12-31';" onblur="(this.type='text')" >
                                        
                </div>   
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-solid fa-location-crosshairs fa-xl"></i> </span>
                    </div>  
                    <select placeholder="Punto de venta" type="text" class="form-control @error('PuntoDeVenta') is-invalid @enderror" id="PuntoDeVenta" name="PuntoDeVenta" value="{{ old('PuntoDeVenta', $factura->PuntoDeVenta ?? '') }}" >
                        <option selected value="">Seleccionar Punto de venta</option>
                            <option value="Alto pance">Alto pance</option>
                            <option value="Valle del lili">Valle del lili</option>
                            <option value="Unicentro">Unicentro</option>
                            <option value="Ingenio">Ingenio</option>
                            <option value="Premier limonar">Premier limonar</option>
                            <option value="Camino real">Camino real</option>
                            <option value="San fernando">San fernando</option>
                            <option value="Peñon">Peñon</option>
                            <option value="La flora">La flora</option>
                            <option value="Chipichape">Chipichape</option>
                            <option value="Cc la estación">Cc la estación</option>
                            <option value="Av roosevelt">Av roosevelt</option>
                            <option value="Cosmocentro">Cosmocentro</option>
                            <option value="Alfaguara">Alfaguara</option>
                            <option value="Palmira mercedes">Palmira mercedes</option>
                            <option value="Palmira llanogrande">Palmira llanogrande</option>
                            <option value="Tuluá">Tuluá</option>
                            <option value="Pasto av estudiantes">Pasto av estudiantes</option>
                            <option value="Pasto panamericana">Pasto panamericana</option>
                            <option value="Pereira">Pereira</option>
                            <option value="Popayan">Popayan</option>
                            <option value="Quibdo">Quibdo</option>
                            <option value="Bochalema">Bochalema</option>
                </select>                  
                </div>   

                <div>
                @if ($errors->has('FechaDeCarga'))
                        <span class="text-danger">{{ $errors->first('FechaDeCarga') }}</span>
                @endif
                </div>
                
                <div class="center">                 
                    <div class="input-group numberinput one">  
                        <div class="label"><span>Pizzas Pequeñas</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoPeq" class="form-control input-number" value="0" max="100"  min="0"  readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput two">  
                        <div class="label"><span>Pizzas Medianas</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoMed">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoMed" class="form-control input-number" value="0" min="0" max="100"  readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoMed">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput three">  
                        <div class="label"><span>Pizzas grandes</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoGra">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoGra" class="form-control input-number" value="0" min="0" max="100"  readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoGra">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput four">  
                        <div class="label"><span>Puntos totales</span></div>
                            <div class="counter">
                                </button>
                            </span>
                            <input type="text" name="PuntosDeFactura" class="form-control input-number PuntosDeFactura" value="0" min="0"   readonly>                          
                        </div>
                    </div>
                    </div>                            
                <div class="buttonform">
                        <button style="font-size:14px !important" type="submit" class="offset-md-5 btn btn-primary submitbill"><i class="fa-solid fa-plus fa-xl"></i> AÑADIR FACTURA</button>

                    </div>                   
                </form>
            </div>              
        </div>
    </div>    
</div>



  
@endsection