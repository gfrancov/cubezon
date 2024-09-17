<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestió de botigues') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                    @forelse ($botigues as $botiga)
                        <div class="mb-6 bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img class="w-20 mr-5" src="{{$botiga->Logo}}" alt="">
                                    <div class="flex flex-col justify-center items-start">
                                        <h3 class="font-MinecraftBold text-xl">{{$botiga->NomBotiga}}</h3>
                                        <p class="text-zinc-600">{{$botiga->Municipi}}</p>
                                    </div>
                                </div>    
                            </div>
                            
                            <div>
                                @if($botiga->productes->isEmpty())

                                <p class="text-zinc-600 text-sm mt-8"> No tens productes en aquesta botiga</p>
                                <p class="mt-3">
                                    <a href="{{ route('productes.create', $botiga->id) }}" class="p-2 py-1 mt-2 bg-green-800 hover:bg-green-600 text-white rounded-sm btn btn-primary mb-3">Afegir producte</a>
                                </p>

                                    
                                @else
                                <table class="table-auto border border-zinc-600 border-collapse rounded-md mt-5">
                                    <thead>
                                        <tr class="text-left border border-zinc-600 rounded-t-md">
                                            <th class="p-3">Producte</th>
                                            <th class="p-3">Descripcio</th>
                                            <th class="p-3">Preu</th>
                                            <th class="p-3">Estoc</th>
                                            <th class="p-3">Accions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($botiga->productes as $producte)
                                            <tr class="border border-zinc-600 p-4">
                                                <td class="p-3">{{ $producte->NomProducte }}</td>
                                                <td class="p-3">{{ $producte->Descripcio }}</td>
                                                <td class="p-3">{{ $producte->Preu }}</td>
                                                <td class="p-3">{{ $producte->Estoc }}</td>
                                                <td class="p-3">
                                                    <a href="{{ route('productes.edit', $producte->id) }}" class="hover:bg-amber-600 p-2 py-1 bg-amber-800 text-white rounded-sm btn btn-warning btn-sm">Modificar</a>
                                                    <form action="{{ route('productes.destroy', $producte->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="p-2 py-0 bg-red-800 hover:bg-red-600 text-white rounded-sm btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="mt-3">
                                    <a href="{{ route('productes.create', $botiga->id) }}" class="p-2 py-1 mt-2 bg-green-800 hover:bg-green-600 text-white rounded-sm btn btn-primary mb-3">Afegir producte</a>
                                </p>
                                @endif
                            </div>

                        </div>
                    
                    @empty

                    <p>No tens cap botiga registrada a Cubezon.<br/>Contacta per discord amb en rojoCaotico.</p>
                    
                    @endforelse
            </div>
        </div>
    </div>
</x-app-layout>