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
    
    <section class="mt-[48px] flex justify-center items-center px-5 lg:px-0">

        <div class="lg:w-[960px] py-12 flex flex-col justify-center items-start">

            <h1 class="font-MinecraftBold text-black text-4xl mb-10">Llistat de botigues a Cubezon</h1>

            @foreach ($botigues as $botiga)

                <a href="/botiga/{{$botiga->NomBotiga}}" class="flex flex-col lg:flex-row items-center p-5 py-8 lg:py-5 bg-white lg:rounded-md lg:shadow-lg mb-5 w-full">
                    <img class="h-24 mr-3" src="{{$botiga->Logo}}" alt="{{$botiga->NomBotiga}}">
                    <div class="flex flex-col items-start lg:mr-12">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-2xl text-black mr-2">{{$botiga->NomBotiga}} </h2>
                            @if($botiga->Prime == 1)
                                <svg class="w-4 fill-sky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                            @endif
                        </div>
        
                        <p class="font-MinecraftRegular text-base text-zinc-600">@if($botiga->Prime != 0)<span class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></span><br/>@endif Botiga de {{$botiga->propietari->name}}</p>
                    </div>
                    <?php
                        $coordenades = explode("&",((explode("?",$botiga->Mapa))[1]));
                    ?>
                    <div class="text-center lg:text-left mt-8 lg:mt-0">
                        <p class="text-base font-MinecraftRegular text-zinc-700">Ubicada a {{$botiga->Municipi}}</p>
                        <p class="text-base font-MinecraftRegular text-zinc-700">Coordenades {{$coordenades[3]}} {{$coordenades[5]}}</p>
                    </div>
                </a>
                
            @endforeach


        </div>

    </section>

@include('includes.footer')
</body>
</html>