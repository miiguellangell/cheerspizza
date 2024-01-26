<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'NumeroDeFactura',
        'IdCliente',
        'NombreDeCliente',
        'FechaDeCarga',
        'ProductoPeq',
        'Productomed',
        'ProductoGra',
        'PuntosDeFactura'    
    ];
}
