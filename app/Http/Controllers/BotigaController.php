<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Botiga;


class BotigaController extends Controller
{
    // Mostrar una botiga
    public function show($nomBotiga) {
        $botiga = Botiga::with(['propietari'])
                        ->where('NomBotiga', $nomBotiga)
                        ->firstOrFail();
        
        return view('botiga', compact('botiga'));
    }

    // Llistat de totes les botigues
    public function list() {

        $botigues = Botiga::with('propietari')->get();
        return view('llistat', compact('botigues'));

    }
}
