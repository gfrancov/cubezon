<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Botiga;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


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

    // Formulari per crear una botiga nova
    public function create() {

        return view('crearBotiga');

    }

    public function store(Request $request) {

        $request->validate([
            'NomBotiga' => 'required|string|max:100|unique:botigas,NomBotiga',
            'Descripcio' => 'nullable|string',
            'Municipi' => 'required|string|max:100',
            'Mapa' => 'required|string',
            'Logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'Imatge' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $botiga = Botiga::create([
            'NomBotiga' => $request->NomBotiga,
            'Descripcio' => $request->Descripcio,
            'Municipi' => $request->Municipi,
            'Mapa' => $request->Mapa,
            'Logo' => '',
            'Imatge' => '',
            'Prime' => 0,
            'PropietariID' => Auth::id(),
            'DataCreacio' => now(),
            'Estat' => 'Actiu',
        ]);

        $carpeta = 'botigues/' . $botiga->id;

        $logoExtensio = $request->file('Logo')->extension();
        $imatgeExtensio = $request->file('Imatge')->extension();

        Storage::disk('public')->putFileAs($carpeta, $request->file('Logo'), 'Logo.' . $logoExtensio);
        Storage::disk('public')->putFileAs($carpeta, $request->file('Imatge'), 'Imatge.' . $imatgeExtensio);

        $botiga->update([
            'Logo' => asset('storage/' . $carpeta . '/Logo.' . $logoExtensio),
            'Imatge' => asset('storage/' . $carpeta . '/Imatge.' . $imatgeExtensio),
        ]);

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Botiga creada exitosament.');

    }

    // Formulari per editar una botiga existent
    public function edit($id) {

        $botiga = Botiga::where('id', $id)
            ->where('PropietariID', Auth::id())
            ->firstOrFail();

        return view('editarBotiga', compact('botiga'));

    }

    public function update(Request $request, $id) {

        $botiga = Botiga::where('id', $id)
            ->where('PropietariID', Auth::id())
            ->firstOrFail();

        $request->validate([
            'NomBotiga' => 'required|string|max:100|unique:botigas,NomBotiga,' . $botiga->id,
            'Descripcio' => 'nullable|string',
            'Municipi' => 'required|string|max:100',
            'Mapa' => 'required|string',
            'Logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'Imatge' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $carpeta = 'botigues/' . $botiga->id;

        $dades = [
            'NomBotiga' => $request->NomBotiga,
            'Descripcio' => $request->Descripcio,
            'Municipi' => $request->Municipi,
            'Mapa' => $request->Mapa,
        ];

        if ($request->hasFile('Logo')) {
            $logoExtensio = $request->file('Logo')->extension();
            Storage::disk('public')->putFileAs($carpeta, $request->file('Logo'), 'Logo.' . $logoExtensio);
            $dades['Logo'] = asset('storage/' . $carpeta . '/Logo.' . $logoExtensio);
        }

        if ($request->hasFile('Imatge')) {
            $imatgeExtensio = $request->file('Imatge')->extension();
            Storage::disk('public')->putFileAs($carpeta, $request->file('Imatge'), 'Imatge.' . $imatgeExtensio);
            $dades['Imatge'] = asset('storage/' . $carpeta . '/Imatge.' . $imatgeExtensio);
        }

        $botiga->update($dades);

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Botiga actualitzada exitosament.');

    }

    public function destroy($id) {

        $botiga = Botiga::where('id', $id)
            ->where('PropietariID', Auth::id())
            ->firstOrFail();

        Storage::disk('public')->deleteDirectory('botigues/' . $botiga->id);

        $botiga->delete();

        return redirect()->route('gestio.mevesBotigues')->with('success', 'Botiga eliminada exitosament.');

    }
}
