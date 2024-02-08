<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Asegúrate de importar el modelo User

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'NumeroDeFactura',
        'user_id', // Asegúrate de que este campo esté en tu tabla facturas
        'FechaDeCarga',
        'ProductoPeq',
        'PuntoDeVenta',
        'ProductoMed',
        'ProductoGra',
        'PuntosDeFactura'    
    ];

    /**
     * Obtener el usuario que posee esta factura.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id es la clave foránea en tu tabla de facturas
    }
}
