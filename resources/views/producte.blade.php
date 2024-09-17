<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/cubezon.png')}}">
    <title>Cubezon | Inici</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-zinc-200">
@include('includes.nav')
    
    <section class="mt-[48px] py-24 flex justify-center items-center">

        <div class="lg:w-[960px] flex flex-col lg:flex-row justify-center items-start mx-5 lg:mx-0">

            <div class="lg:w-1/2 flex justify-center items-start mb-6 lg:mb-0">
                <img class="w-64" src="{{asset($producte->Icona)}}" alt="{{$producte->NomProducte}}">
            </div>

            <div class="lg:w-1/2 flex flex-col justify-start items-start p-8 bg-white lg:rounded-md lg:shadow-lg">
                <div class="flex">
                    <h1 class="text-4xl font-MinecraftBold text-black mr-4" style="text-wrap:balance;">{{$producte->NomProducte}}</h1>
                    @if(substr($producte->Descripcio, -6) == 'Oferta')
                    <span class="text-sm flex justify-center items-center text-white px-2 py-1 bg-red-600 rounded-sm font-MinecraftBold">OFERTA</span>
                    @endif
                </div>

                @if($producte->Prime == 1)
                    <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                @endif
                <p class="font-MinecraftRegular text-zinc-700 text-lg">{{$producte->Descripcio}}</p>

                @if ($producte->Estat == 'No Disponible' || $producte->Estoc == 0)
                <div class="py-5 border-b border-zinc-300 w-full">
                    <p class="font-MinecraftRegular text-zinc-400 text-sm">Preu unitari:</p>
                    <p class="font-MinecraftBold text-red-700 text-3xl">ESGOTAT</p>
                </div>

                @else

                <div class="py-5 border-b border-zinc-300 w-full">
                    <p class="font-MinecraftRegular text-zinc-400 text-sm">Preu unitari:</p>
                    <p class="font-MinecraftBold text-green-700 text-3xl">{{$producte->Preu}}$</p>
                </div>
                    
                @endif

                <div class="mt-6">
                    <p class="font-MinecraftRegular text-zinc-500 text-sm mb-3">Botiga de l'usuari {{$producte->botiga->propietari->name}}</p>
                    <a href="/botiga/{{$producte->botiga->NomBotiga}}" class="flex mb-3 items-center">

                        <img class="w-16 mr-3" src="{{$producte->botiga->Logo}}" alt="">
                        <div class="flex">
                            <h3 class="text-xl font-MinecraftBold text-zinc-800 mr-2">{{$producte->botiga->NomBotiga}}</h3>
                            @if($producte->botiga->NomBotiga == 'Cubezon Basics')
                                <svg class="w-3 fill-sky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            @endif
                        </div>

                    </a>

                    <?php 
                    
                        $coordenades = explode("&",((explode("?",$producte->botiga->Mapa))[1]));

                    ?>

                    <div class="">
                        <p class="font-MinecraftRegular text-zinc-500 text-sm">Aquesta botiga es troba a {{$producte->botiga->Municipi}}. Coordenades {{$coordenades[3]}} {{$coordenades[5]}}</p>
                        <iframe src="{{$producte->botiga->Mapa}}" class="w-full h-[50vh]" frameborder="0"></iframe>
                    </div>
                </div>

            </div>

        </div>

    </section>

@include('includes.footer')
</body>
</html>