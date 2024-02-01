<?php

namespace Database\Seeders;
use App\Models\facturas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class facturas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factura::create([
            'NumeroDeFactura' => '12345689',
            'user_id'=> '1',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'2',
            'Productomed'  =>'1',
            'ProductoGra'  =>'0',
            'PuntosDeFactura'=>'4'         
        ]);

        factura::create([
            'NumeroDeFactura' => '99999999',
            'user_id'=> '2',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'1',
            'Productomed'  =>'0',
            'ProductoGra'  =>'1',
            'PuntosDeFactura'=>'4'         
        ]);

        factura::create([
            'NumeroDeFactura' => '50505050',
            'user_id'=> '3',
            'FechaDeCarga' => '2024-01-24',
            'ProductoPeq'  =>'0',
            'Productomed'  =>'0',
            'ProductoGra'  =>'1',
            'PuntosDeFactura'=>'3'         
        ]);
    }
}
