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

            <form action="{{ route('productes.update', $producte->id) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="BotigaID" value="{{ $producte->botiga->id }}">
                <div class="form-group flex flex-col mb-3">
                    <label for="NomProducte">Nom del Producte</label>
                    <input type="text" class="form-control" id="NomProducte" name="NomProducte" value="{{$producte->NomProducte}}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Descripcio">Descripció</label>
                    <textarea class="form-control" id="Descripcio" name="Descripcio">{{$producte->Descripcio}}</textarea>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="CategoriaID">Categoria</label>
                    <select name="CategoriaID" id="CategoriaID">
                        @foreach ($categories as $categoria)
                            <option @if($categoria->id == $producte->CategoriaID) selected @endif value="{{$categoria->id}}">{{$categoria->NomCategoria}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Icona">URL de la icona (opcional i quadrada, demanar per discord si cal ajuda)</label>
                    <input type="text" class="form-control" id="Icona" name="Icona" value="{{$producte->Icona}}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Preu">Preu</label>
                    <input type="number" step='0.01' class="form-control" id="Preu" name="Preu" value="{{$producte->Preu}}" required>
                </div>
                <div class="form-group flex flex-col mb-3">
                    <label for="Estoc">Estoc</label>
                    <input type="number" class="form-control" id="Estoc" name="Estoc" value="{{$producte->Estoc}}" required>
                </div>
                <button type="submit" class="p-2 py-1 mt-2 bg-green-800 hover:bg-green-600 text-white rounded-sm btn btn-primary">Guardar canvis</button>
            </form>
        

        </div>
    </div>
</x-app-layout>