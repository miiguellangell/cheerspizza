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
                    <a href="{{ route('facturas.index') }}" class="btn btn-primary btn-sm">&larr; Volver </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('facturas.store') }}" method="post">
                    @csrf
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-solid fa-hashtag fa-xl"></i></span>
                    </div>
                    <input placeholder="Ingresa el numero de factura" type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
                         @if ($errors->has('code'))
                        <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
                    </div> 

                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-user fa-xl"></i> </span>
                    </div>
                    <input  placeholder="Selecciona un cliente"  type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                </div> 
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa-regular fa-calendar-days fa-xl"></i> </span>
                    </div>  
                    <input placeholder="Fecha de Compra"  type="text" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" onblur="(this.type='text')" onfocus="(this.type='date')" >
                                        @if ($errors->has('quantity'))
                                            <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                        @endif
                </div>    
                
                <div class="center">                 
                    <div class="input-group numberinput one">  
                        <div class="label"><span>hola</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoPeq" class="form-control input-number" value="0" min="0" max="100" disabled>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoPeq">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput two">  
                        <div class="label"><span>hola</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoMed">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoMed" class="form-control input-number" value="0" min="0" max="100" disabled>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoMed">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput three">  
                        <div class="label"><span>hola</span></div>
                            <div class="counter">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number minus"  data-type="minus" data-field="ProductoGra">
                                    <span class="glyphicon glyphicon-minus"><i class="fa-solid fa-minus fa-xl"></i></span>
                                </button>
                            </span>
                            <input type="text" name="ProductoGra" class="form-control input-number" value="0" min="0" max="100" disabled>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number plus" data-type="plus" data-field="ProductoGra">
                                    <span class="glyphicon glyphicon-plus"><i class="fa-solid fa-plus fa-xl"></i></span>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="input-group numberinput four">  
                        <div class="label"><span>hola</span></div>
                            <div class="counter">
                                </button>
                            </span>
                            <input type="text" name="Resultado" class="form-control input-number resultado" value="0" min="0"  disabled>                          
                        </div>
                    </div>
                    </div>                            
                <div class="buttonform">
                        <button type="submit" class="offset-md-5 btn btn-primary submitbill"><i class="fa-solid fa-plus fa-xl"></i> AÑADIR FACTURA</button>

                    </div>                   
                </form>
            </div>              
        </div>
    </div>    
</div>



  
@endsection