<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(Request $peticio)
    {

        if($peticio->cerca) {

            $cerca = $peticio->cerca;

            $productes = Producte::with(['botiga'])
                ->selectRaw("
                    productes.*, 
                    (CASE 
                        WHEN Descripcio LIKE '%oferta%' THEN 4
                        WHEN NomProducte LIKE ? THEN 3
                        WHEN Descripcio LIKE ? THEN 2
                        ELSE 1
                    END) as relevance", ["%{$cerca}%", "%{$cerca}%"])
                ->where('NomProducte', 'like', "%{$cerca}%")
                ->orWhere('Descripcio', 'like', "%{$cerca}%")
                ->orWhereHas('botiga', function ($query) use ($cerca) {
                    $query->where('NomBotiga', 'like', "%{$cerca}%");
                })
                // Ordenar primero por productos que contengan "oferta" en la descripción
                ->orderByRaw("CASE WHEN Descripcio LIKE '%oferta%' THEN 1 ELSE 0 END DESC")
                // Ordenar por 'prime' (1) para priorizar productos prime
                ->orderBy('prime', 'desc')  
                // Finalmente, ordenar por relevancia
                ->orderBy('relevance', 'desc')  
                ->get();

            return view('cerca', compact('productes', 'cerca'));
        

        } else {

            // Obtener los productos más recientes para mostrar en la landing
            $productes = Producte::with(['botiga.propietari'])
                // Priorizar productos que contengan "oferta" en la descripción
                ->orderByRaw("CASE WHEN Descripcio LIKE '%oferta%' THEN 1 ELSE 0 END DESC")
                // Luego ordenar por fecha de creación (más recientes primero)
                ->orderBy('created_at', 'desc')
                // Limitar a los 12 productos más recientes
                ->take(12)
                ->get();
        
            // Retornar la vista con los productos
            return view('landing', compact('productes'));

        }
    }

    public function nouIndex(Request $peticio)
    {
        if ($peticio->cerca) {

            $cerca = $peticio->cerca;

            $productes = Producte::with(['botiga'])
                ->selectRaw("
                    productes.*, 
                    (CASE 
                        WHEN Descripcio LIKE '%oferta%' THEN 4
                        WHEN NomProducte LIKE ? THEN 3
                        WHEN Descripcio LIKE ? THEN 2
                        ELSE 1
                    END) as relevance", ["%{$cerca}%", "%{$cerca}%"])
                ->where('NomProducte', 'like', "%{$cerca}%")
                ->orWhere('Descripcio', 'like', "%{$cerca}%")
                ->orWhereHas('botiga', function ($query) use ($cerca) {
                    $query->where('NomBotiga', 'like', "%{$cerca}%");
                })
                // Ordenar primero por productos que contengan "oferta" en la descripción
                ->orderByRaw("CASE WHEN Descripcio LIKE '%oferta%' THEN 1 ELSE 0 END DESC")
                // Ordenar por 'prime' (1) para priorizar productos prime
                ->orderBy('prime', 'desc')  
                // Finalmente, ordenar por relevancia
                ->orderBy('relevance', 'desc')  
                ->get();

            return view('cerca', compact('productes', 'cerca'));
        } else {
            // Arrays para las categorías con información extendida y productos más vendidos
            $ofertas = Producte::with(['botiga' => function($query) {
                $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
            }])
                ->where('Descripcio', 'like', '%oferta%')
                ->select('id', 'NomProducte', 'Descripcio', 'Icona', 'CategoriaID', 'BotigaID', 'Preu', 'Estoc', 'Prime')
                ->take(10)
                ->get();

            $categories = [
                'armes' => 2,
                'blocs' => 3,
                'menjar' => 4,
                'encantaments' => 8,
                'eines' => 7
            ];

            $resultados = [];

            foreach ($categories as $key => $categoriaID) {
                $productos_vendidos = Producte::with(['botiga' => function($query) {
                    $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
                }])
                    ->join('detall_comandas', 'productes.id', '=', 'detall_comandas.ProducteID')
                    ->where('CategoriaID', $categoriaID)
                    ->select(
                        'productes.id',
                        'productes.NomProducte',
                        'productes.Descripcio',
                        'productes.Icona',
                        'productes.CategoriaID',
                        'productes.BotigaID',
                        'productes.Preu',
                        'productes.Estoc',
                        'productes.Prime',
                        DB::raw('SUM(detall_comandas.Quantitat) as total_vendes')
                    )
                    ->groupBy(
                        'productes.id',
                        'productes.NomProducte',
                        'productes.Descripcio',
                        'productes.Icona',
                        'productes.CategoriaID',
                        'productes.BotigaID',
                        'productes.Preu',
                        'productes.Estoc',
                        'productes.Prime'
                    )
                    ->orderByDesc('total_vendes')
                    ->take(10)
                    ->get();

                // Si hay menos de 10 productos, completar con productos no vendidos
                if ($productos_vendidos->count() < 10) {
                    $faltantes = 10 - $productos_vendidos->count();

                    $productos_no_vendidos = Producte::with(['botiga' => function($query) {
                        $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
                    }])
                        ->where('CategoriaID', $categoriaID)
                        ->whereNotIn('id', $productos_vendidos->pluck('id'))
                        ->select(
                            'id',
                            'NomProducte',
                            'Descripcio',
                            'Icona',
                            'CategoriaID',
                            'BotigaID',
                            'Preu',
                            'Estoc',
                            'Prime'
                        )
                        ->take($faltantes)
                        ->get();

                    $productos_vendidos = $productos_vendidos->concat($productos_no_vendidos);
                }

                $resultados[$key] = $productos_vendidos;
            }

            $nous_productes = Producte::with(['botiga' => function($query) {
                $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
            }])
                ->select('id', 'NomProducte', 'Descripcio', 'Icona', 'CategoriaID', 'BotigaID', 'Preu', 'Estoc', 'Prime')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            return view('nouLanding', array_merge($resultados, compact('ofertas', 'nous_productes')));
        }
    }

    public function showCategoryProducts($id)
    {
        // Obtener datos de la categoría
        $categoria = Categoria::findOrFail($id);

        // Obtener todos los productos de la misma categoría
        $productes = Producte::with(['botiga' => function($query) {
            $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
        }])
            ->where('CategoriaID', $id)
            ->orderByRaw("CASE WHEN Descripcio LIKE '%oferta%' THEN 1 ELSE 0 END DESC")
            ->get();

        return view('categoria', compact('productes', 'categoria'));
    }

    public function showOfertes() {
        // Obtener todos los productos en oferta
        $productesEnOferta = Producte::with(['botiga' => function($query) {
            $query->select('id', 'NomBotiga', 'Municipi', 'Mapa');
        }])
            ->where('Descripcio', 'like', '%oferta%')
            ->orderBy('Preu', 'asc') // Ordenar por precio ascendente
            ->get();

        return view('ofertes', compact('productesEnOferta'));

    }


}
