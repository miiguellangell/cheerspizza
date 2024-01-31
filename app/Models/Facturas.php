<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'NumeroDeFactura',
        'IdCliente',
        'NombreDeCliente',
        'FechaDeCarga',
        'ProductoPeq',
        'ProductoMed',
        'ProductoGra',
        'PuntosDeFactura'    
    ];
}
