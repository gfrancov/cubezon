<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Botiga;

class UserController extends Controller
{
    //
    public function mevesBotigues() {

        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Recuperar todas las tiendas donde el PropietariID coincide con el ID del usuario autenticado
        $botigues = Botiga::where('PropietariID', $userId)->with('productes')->get();

        // Retornar una vista con las tiendas del usuario
        return view('dashboard', compact('botigues'));        

    }
}
