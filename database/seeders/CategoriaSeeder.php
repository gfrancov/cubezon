<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['NomCategoria' => 'Sense categoria', 'Descripcio' => 'Objectes o altres que no encaixen en les categories.'],
            ['NomCategoria' => 'Armes', 'Descripcio' => 'Tot tipus d\'armes com espases, arcs i tridents.'],
            ['NomCategoria' => 'Blocs', 'Descripcio' => 'Blocs utilitzats per a construccions i decoracions.'],
            ['NomCategoria' => 'Menjar', 'Descripcio' => 'Aliments per a mantenir la barra de fam plena.'],
            ['NomCategoria' => 'Minerals', 'Descripcio' => 'Minerals i materials per a la creació d\'ítems.'],
            ['NomCategoria' => 'Pocions', 'Descripcio' => 'Pocions que proporcionen diferents efectes.'],
            ['NomCategoria' => 'Eines', 'Descripcio' => 'Eines per a la mineria, tala d\'arbres i altres tasques.'],
            ['NomCategoria' => 'Encantaments', 'Descripcio' => 'Llibres i altres ítems amb encantaments.'],
            ['NomCategoria' => 'Vestimenta', 'Descripcio' => 'Armors i altres vestits protectors.'],
            ['NomCategoria' => 'Decoració', 'Descripcio' => 'Ítems utilitzats per decorar edificis i entorns.'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }

    }
}
