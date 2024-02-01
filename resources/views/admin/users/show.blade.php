@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Factura #  {{ $factura->NumeroDeFactura }}
                </div>
                <div class="float-end">
                <a style="font-size:15px;"  href="{{ route('facturas.index') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-backward"></i> Volver </a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong># De Factura:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->NumeroDeFactura }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre de Cliente:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->IdCliente }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Pizzas peq y/o Personal:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->NombreDeCliente }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Pizzas Medianas</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->ProductoPeq }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Pizzas Grandes</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->ProductoMed }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Puntos de esta factura</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->ProductoGra }}
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $factura->PuntosDeFactura }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection