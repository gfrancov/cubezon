<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

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
                        WHEN NomProducte LIKE ? THEN 3
                        WHEN Descripcio LIKE ? THEN 2
                        ELSE 1
                    END) as relevance", ["%{$cerca}%", "%{$cerca}%"])
                ->where('NomProducte', 'like', "%{$cerca}%")
                ->orWhere('Descripcio', 'like', "%{$cerca}%")
                ->orWhereHas('botiga', function ($query) use ($cerca) {
                    $query->where('NomBotiga', 'like', "%{$cerca}%");
                })
                ->orderBy('relevance', 'desc')
                ->get();

            return view('cerca', compact('productes', 'cerca'));
        

        } else {

            // Obtener los productos más recientes para mostrar en la landing
            $productes = Producte::with(['botiga.propietari'])->orderBy('created_at', 'desc')->take(12)->get();

            // Retornar la vista con los productos
            return view('landing', compact('productes'));

        }
    }

}
