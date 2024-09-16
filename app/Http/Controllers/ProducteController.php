<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producte;
use App\Models\Botiga;
use App\Models\Categoria;

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
            'Icona' => 'required|url',
            'CategoriaID' => 'required',
            'Estoc' => 'required|integer',
            'BotigaID' => 'required|exists:botigas,id',
        ]);

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

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producto añadido exitosamente.');
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

        $producte = Producte::findOrFail($id);
        $producte->update($request->all());

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producte = Producte::findOrFail($id);
        $producte->delete();

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Producto eliminado exitosamente.');
    }

}
