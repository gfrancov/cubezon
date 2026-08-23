<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestió de botigues') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-[680px] mx-auto p-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <x-validation-errors class="mb-4" />
            </div>
            <form action="{{ route('botigues.update', $botiga->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group flex flex-col mb-3">
                    <label for="NomBotiga">Nom de la botiga</label>
                    <input type="text" class="form-control" id="NomBotiga" name="NomBotiga" value="{{ old('NomBotiga', $botiga->NomBotiga) }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Descripcio">Descripció</label>
                    <textarea class="form-control" id="Descripcio" name="Descripcio">{{ old('Descripcio', $botiga->Descripcio) }}</textarea>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Municipi">Municipi</label>
                    <input type="text" class="form-control" id="Municipi" name="Municipi" value="{{ old('Municipi', $botiga->Municipi) }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Mapa">URL d'incrustació del Mapa (iframe embed src)</label>
                    <input type="text" class="form-control" id="Mapa" name="Mapa" value="{{ old('Mapa', $botiga->Mapa) }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Logo">Logo de la botiga (imatge quadrada)</label>
                    <img src="{{ $botiga->Logo }}" alt="Logo actual" class="w-20 h-20 object-cover rounded-full mb-2 border border-zinc-200">
                    <input type="file" class="form-control" id="Logo" name="Logo" accept="image/png,image/jpeg,image/webp">
                    <p class="text-xs text-zinc-500 mt-1">Deixa-ho buit si no vols canviar el logo actual.</p>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Imatge">Foto de portada</label>
                    <img src="{{ $botiga->Imatge }}" alt="Portada actual" class="w-full h-32 object-cover rounded-md mb-2 border border-zinc-200">
                    <input type="file" class="form-control" id="Imatge" name="Imatge" accept="image/png,image/jpeg,image/webp">
                    <p class="text-xs text-zinc-500 mt-1">Deixa-ho buit si no vols canviar la foto de portada actual.</p>
                </div>
                <button type="submit" class="p-2 py-1 mt-2 bg-green-800 hover:bg-green-600 text-white rounded-sm btn btn-primary">Desar canvis</button>
            </form>

            <form action="{{ route('botigues.destroy', $botiga->id) }}" method="POST" class="mt-6 pt-6 border-t border-zinc-200" onsubmit="return confirm('Segur que vols eliminar la botiga «{{ $botiga->NomBotiga }}»? Aquesta acció també eliminarà tots els seus productes i no es pot desfer.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 py-1 bg-red-800 hover:bg-red-600 text-white rounded-sm btn btn-danger">Eliminar botiga</button>
            </form>
        </div>
    </div>
</x-app-layout>
