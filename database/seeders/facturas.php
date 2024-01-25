<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class facturas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Factura::create([
            'NumeroDeFactura' => '12345689',
            'IdCliente' => '2',
            'NombreDeCliente' => 'Juan Perez',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'2',
            'Productomed'  =>'1',
            'ProductoGra'  =>'0',
            'PuntosDeFactura'=>'4'         
        ]);

        Factura::create([
            'NumeroDeFactura' => '99999999',
            'IdCliente' => '3',
            'NombreDeCliente' => 'Maria Lopez',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'1',
            'Productomed'  =>'0',
            'ProductoGra'  =>'1',
            'PuntosDeFactura'=>'4'         
        ]);

        Factura::create([
            'NumeroDeFactura' => '50505050',
            'IdCliente' => '4',
            'NombreDeCliente' => 'Manuel Brito',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'0',
            'Productomed'  =>'0',
            'ProductoGra'  =>'1',
            'PuntosDeFactura'=>'3'         
        ]);
    }
}
