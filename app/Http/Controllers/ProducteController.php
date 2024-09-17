<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;
use App\Models\Botiga;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class ProducteController extends Controller
{
    //
    public function show($id) {
        $producte = Producte::with(['botiga.propietari'])->findOrFail($id);

        return view('producte', compact('producte'));
        
    }

    public function create($botigaId)
    {
        $botiga = Botiga::findOrFail($botigaId);

        $categories = Categoria::all();

        return view('crear', compact('botiga','categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'NomProducte' => 'required|string|max:100',
            'Descripcio' => 'nullable|string',
            'Preu' => 'required|numeric',
            'Icona' => 'required',
            'CategoriaID' => 'required',
            'Estoc' => 'required|integer',
            'BotigaID' => 'required|exists:botigas,id',
        ]);

        // Verificar que la tienda pertenece al usuario autenticado
        $botiga = Botiga::where('id', $request->BotigaID)
        ->where('PropietariID', Auth::id())
        ->firstOrFail();

        Producte::create([
            'NomProducte' => $request->NomProducte,
            'Descripcio' => $request->Descripcio,
            'Preu' => $request->Preu,
            'Icona' => $request->Icona,
            'CategoriaID' => intval($request->CategoriaID),
            'Estoc' => $request->Estoc,
            'BotigaID' => $request->BotigaID,
            'DataCreacio' => now(),
            'Estat' => 'Disponible',
        ]);

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producte afegit exitosament.');
    }

    public function edit($id)
    {
        $producte = Producte::with(['botiga.propietari'])->findOrFail($id);
        $categories = Categoria::all();
        return view('modificar', compact('producte','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NomProducte' => 'required|string|max:255',
            'Descripcio' => 'nullable|string',
            'CategoriaID' => 'required',
            'Preu' => 'required|numeric',
            'Estoc' => 'required|integer',
        ]);

        // Buscar el producto y asegurar que pertenece a una tienda del usuario autenticado
        $producte = Producte::where('id', $id)
            ->whereHas('botiga', function($query) {
                $query->where('PropietariID', Auth::id());
            })
            ->firstOrFail();

        $producte->update($request->all());

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producte actualitzat exitosament.');
    }

    public function destroy($id)
    {
        $producte = Producte::findOrFail($id);
        $producte->delete();

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producte eliminat exitosament.');
    }

}
