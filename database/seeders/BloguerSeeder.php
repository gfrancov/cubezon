<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Botiga;
use App\Models\Producte;
use App\Models\Categoria;
use App\Models\Item;

class BloguerSeeder extends Seeder
{
    public function run()
    {
        // Crear el usuario Bloguer
        $bloguer = User::create([
            'name' => 'Bloguer',
            'email' => 'bloguer@example.com',
            'password' => bcrypt('password'), // Canviar contrasenya
        ]);

        // Crear la botiga Cal Bruixot
        $botiga = Botiga::create([
            'NomBotiga' => 'Cal Bruixot',
            'Descripcio' => 'Una botiga màgica amb tot el que necessites.',
            'Municipi' => 'Andorra',
            'Mapa' => 'https://mapa.cubecat.cat/?worldname=catalunya&mapname=flat&zoom=5&x=13491&y=64&z=8931',
            'Logo' => 'https://cubezon.gabi.work/botigues/CalBruixot/Logo.png',
            'Imatge' => 'https://cubezon.gabi.work/botigues/CalBruixot/Imatge.png',
            'PropietariID' => $bloguer->id,
            'DataCreacio' => now(),
            'Estat' => 'Actiu',
        ]);

        // Crear un parell de productes
        Producte::create([
            'NomProducte' => 'Espasa de Diamant',
            'Descripcio' => 'Encantada amb Retroces II',
            'Preu' => 190.00,
            'Icona' => '/item/diamond_sword_enchanted.webp',
            'CategoriaID' => 1,
            'BotigaID' => $botiga->id,
            'DataCreacio' => now(),
            'Estoc' => 2,
            'Estat' => 'Disponible',
        ]);

        Producte::create([
            'NomProducte' => 'Ales elytra',
            'Descripcio' => 'Ales elytra per sobrevolar Cubecat',
            'Preu' => 2200.00,
            'Icona' => '/item/elytra.webp',
            'CategoriaID' => 1,
            'BotigaID' => $botiga->id,
            'DataCreacio' => now(),
            'Estoc' => 1,
            'Estat' => 'Disponible',
        ]);
    }
}
