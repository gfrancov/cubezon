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
            <form action="{{ route('botigues.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group flex flex-col mb-3">
                    <label for="NomBotiga">Nom de la botiga</label>
                    <input type="text" class="form-control" id="NomBotiga" name="NomBotiga" value="{{ old('NomBotiga') }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Descripcio">Descripció</label>
                    <textarea class="form-control" id="Descripcio" name="Descripcio">{{ old('Descripcio') }}</textarea>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Municipi">Municipi</label>
                    <input type="text" class="form-control" id="Municipi" name="Municipi" value="{{ old('Municipi') }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Mapa">URL d'incrustació del Mapa (iframe embed src)</label>
                    <input type="text" class="form-control" id="Mapa" name="Mapa" value="{{ old('Mapa') }}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Logo">Logo de la botiga (imatge quadrada)</label>
                    <input type="file" class="form-control" id="Logo" name="Logo" accept="image/png,image/jpeg,image/webp" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Imatge">Foto de portada</label>
                    <input type="file" class="form-control" id="Imatge" name="Imatge" accept="image/png,image/jpeg,image/webp" required>
                </div>
                <button type="submit" class="p-2 py-1 mt-2 bg-green-800 hover:bg-green-600 text-white rounded-sm btn btn-primary">Crear botiga</button>
            </form>
        </div>
    </div>
</x-app-layout>
