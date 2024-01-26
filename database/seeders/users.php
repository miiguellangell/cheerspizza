<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'CheersAdmin',
            'email' => 'jefe.mercadeocheers@gmail.com',
            'password' => bcrypt('G3cKMc1EKtAFPWp'),
            'UserType' => '1',
            'Acumulados'=> '5',
        ]);
        User::create([
            'name' => 'Usuario De Pruebas',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456789'),
            'UserType' => '0',
            'Acumulados'=> '10',
        ]);
        User::create([
            'name' => 'Juan Perez',
            'email' => 'miiguellangellmc@gmail.com',
            'password' => bcrypt('123456789'),
            'UserType' => '0',
            'Acumulados'=> '4',
        ]);
        User::create([
            'name' => 'Maria Lopez',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456789'),
            'UserType' => '0',
        ]);
        User::create([
            'name' => 'Manuel Brito',
            'email' => 'pizza@gmail.com',
            'password' => bcrypt('123456789'),
            'UserType' => '0',
        ]);
    }
}
