<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/cubezon.png')}}">
    <title>Cubezon | Comanda</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-zinc-200">
@include('includes.nav')
    
    <section class="mt-[48px] flex justify-center items-center px-5 lg:px-0">

        <div class="lg:w-[960px] py-12 flex flex-col justify-center items-start">

            <div class="mt-20 w-full mb-10">

                @if(session('success'))
                    <div class="flex flex-col items-center justify-center mb-10">
                        <svg class="w-10 fill-green-700 mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                        <p class="font-MinecraftBold text-2xl text-green-700">{{ session('success') }}</p>
                    </div>
                @endif
                
            
                    <div class="bg-white p-5">

                        <div class="flex justify-between">
                            <div>
                                <h2 class="font-MinecraftBold text-2xl">Detalls de la comanda</h2>
                                <p class="font-MinecraftRegular text-zinc-500">Comprat el {{date('j \d\e F \d\e Y', strtotime($comanda->DataComanda))}} | Comanda num. {{$comanda->id}}</p>        
                            </div>
                            <div>
                                @if($comanda->Pagat == 0)
                                    <p class="font-MinecraftBold text-red-600 text-2xl">PENDENT DE PAGAMENT</p>
                                @else
                                    <p class="font-MinecraftBold text-green-600 text-2xl">PAGAT</p>
                                @endif
                            </div>

                        </div>

                        @if($comanda->Pagat == 0)
                            
                            <div class="border border-zinc-300 rounded-lg p-5 mt-5 font-MinecraftRegular">

                                Per efectuar el pagament, has d'executar la següent comanda al servidor:

                                <p class="text-green-600 font-MinecraftBold text-2xl">/cubezonconfirm {{$comanda->id}}</p>

                            </div>

                        @else
                            <div class="border border-zinc-300 rounded-lg p-5 mt-5 font-MinecraftRegular">

                                @if($comanda->EstatEstatComanda == "Lliurat")
                                    <p class="font-MinecraftBold">Ja es pot recollir la comanda!</p>
                                @endif
                                <p class="font-MinecraftBold">Estat de la comanda: <span class="font-MinecraftRegular">{{$comanda->EstatComanda}}</span></p>
                                <p class="font-MinecraftBold">Empresa d'enviament del paquet: <span class="font-MinecraftRegular">{{$comanda->Empresa}}</span></p>

                            </div>
                        @endif

                        <div class="flex border border-zinc-300 rounded-lg p-5 mt-5 font-MinecraftRegular">

                            <div class="lg:w-1/2">
                                <p class="font-MinecraftBold">Recollida de la comanda</p>
                                <p>{{$comanda->Ubicacio}}</p>
                            </div>

                            <div class="lg:w-1/2">
                                <p class="font-MinecraftBold">Resum de la comanda</p>
                                @foreach ($comanda->detalls as $detall)
                                    <div class="flex justify-between">
                                        <p>{{$detall->producte->NomProducte}}</p>
                                        <p class="font-MinecraftRegular">{{$detall->producte->Preu}}</p>
                                    </div>
                                @endforeach
                                @if ($prime == 0)
                                    <div class="flex justify-between">
                                        <p>Cost Enviament</p>
                                        <p class="font-MinecraftRegular">150</p>
                                    </div>
                                @else
                                    <div class="flex justify-between">
                                        <p>Cost Enviament</p>
                                        <p class="font-MinecraftRegular">0</p>
                                    </div>
                                @endif
                                <div class="flex justify-between">
                                    <p>Import final</p>
                                    <p class="font-MinecraftBold">{{$comanda->Total}}</p>
                                </div>
                            </div>




                        </div>

                        @foreach ($comanda->detalls as $detall)
                                
                            <div class="border border-zinc-300 mt-5 p-5 rounded-lg font-MinecraftRegular flex justify-between">
                                <div class="flex flex-col lg:flex-row justify-center lg:justify-start lg:items-center">
                                    <img src="{{$detall->producte->Icona}}" class="w-32 lg:mr-5" alt="{{$detall->producte->NomProducte}}">

                                    <div class="font-MinecraftRegular text-sm">
                                        <h2 class="text-2xl font-MinecraftBold text-zinc-800">{{$detall->producte->NomProducte}}</h2>
                                        @if($detall->producte->Prime == '1')
                                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                                        @endif
                                        <div class="mt-5 flex">
                                            <p>Unitats: {{$detall->Quantitat}} </p>
                                            &nbsp;|&nbsp;
                                            <p>Preu/unitat: {{$detall->PreuUnitari}}€</p>
                                        </div>
                                    </div>    
                                </div>

                                <div class="w-auto flex text-right">
                                    <p class="font-MinecraftBold text-2xl">@php echo number_format((float)($detall->Quantitat*$detall->PreuUnitari), 2, ',', ''); @endphp €</p>
                                </div>

                            </div>

                        @endforeach

    
                    </div>
                                
            </div>
            

        </div>

    </section>

@include('includes.footer')
</body>
</html>