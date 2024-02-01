@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

    @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h1>EDITAR FACTURA</h1>
                </div>
                <div class="float-end">
                    <a style="font-size:15px;"  href="{{ route('facturas.index') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-backward"></i> Volver </a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('facturas.update', $facturas->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-solid fa-hashtag fa-xl"></i></span>
                    </div>
                    <input readonly placeholder="Ingresa el numero de factura" type="text" class="form-control @error('NumeroDeFactura') is-invalid @enderror" id="NumeroDeFactura" name="NumeroDeFactura" value="{{ $facturas->NumeroDeFactura }}">
                    </div> 
                    @if ($errors->has('NumeroDeFactura'))
                       <div> <span class="text-danger">{{ $errors->first('NumeroDeFactura') }}</span></div>
                    @endif

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-user fa-xl"></i> </span>
                    </div>
                    <input  placeholder="Selecciona un cliente"  type="text" class="form-control @error('NombreDeCliente') is-invalid @enderror" id="NombreDeCliente" name="NombreDeCliente" value="{{ $facturas->NombreDeCliente }}">
                </div> 
                <div>
                    @if ($errors->has('NombreDeCliente'))
                        <span class="text-danger">{{ $errors->first('NombreDeCliente') }}</span>
                    @endif
                </div>
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-calendar-days fa-xl"></i> </span>
                    </div>  
                    <input placeholder="Fecha de Compra"  type="text" class="form-control @error('FechaDeCarga') is-invalid @enderror" id="FechaDeCarga" name="FechaDeCarga" value="{{ $facturas->FechaDeCarga }}" onblur="(this.type='text')" onfocus="(this.type='date')" >
                                        
                </div>    
                <div>
                @if ($errors->has('FechaDeCarga'))
                        <span class="text-danger">{{ $errors->first('FechaDeCarga') }}</span>
                @endif
                </div>
                
                <div class="center">                 
                    <div class="input-group numberinput one">  
                        <div class="label"><span>Pizzas Pequeñas y/o personales</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoPeq" class="form-control input-number"  max="100"  min="0"  readonly value="{{ $facturas->ProductoPeq }}">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput two">  
                        <div class="label"><span>Pizzas medianas</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoMed" >
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoMed" class="form-control input-number" min="0" max="100"  readonly value="{{ $facturas->ProductoMed }}">
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
                            <input type="text" name="ProductoGra" class="form-control input-number"  min="0" max="100"  readonly value="{{ $facturas->ProductoGra }}">
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
                            <input type="text" name="PuntosDeFactura" class="form-control input-number PuntosDeFactura"  min="0"   readonly value="{{ $facturas->PuntosDeFactura }}">                          
                        </div>
                    </div>
                    </div>                            
                <div class="buttonform">
                        <button style="font-size:14px !important" type="submit" class="offset-md-5 btn btn-primary submitbill"><i class="fa-solid fa-pencil"></i> ACTUALIZAR</button>

                    </div>                   
                </form>
            </div>              
        </div>
    </div>    
</div>



  
@endsection