<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Botiga;
use App\Models\Producte;
use App\Models\Categoria;
use App\Models\Item;

class AdminShopSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario Bloguer
        $adminshop = User::create([
            'name' => 'Adminshop',
            'email' => 'adminshop@example.com',
            'password' => bcrypt('password'), // Canviar contrasenya
        ]);
        
    }
}
