<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;

class ProducteController extends Controller
{
    //
    public function show($id) {
        $producte = Producte::with(['botiga.propietari', 'item'])->findOrFail($id);

        return view('producte', compact('producte'));
        
    }
}
