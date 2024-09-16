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
    
    <section class="mt-[48px] flex justify-center items-center">

        <div class="lg:w-[960px] py-12 flex flex-col justify-center items-start">

            <h1 class="font-MinecraftBold text-black text-4xl mb-10">Llistat de botigues a Cubezon</h1>

            @foreach ($botigues as $botiga)

                <a href="/botiga/{{$botiga->NomBotiga}}" class="flex items-center p-5 bg-white lg:rounded-md lg:shadow-lg mb-5 w-full">
                    <img class="h-24 mr-3" src="{{$botiga->Logo}}" alt="{{$botiga->NomBotiga}}">
                    <div class="flex flex-col items-start lg:mr-12">
                        <h2 class="font-MinecraftBold text-2xl text-black">{{$botiga->NomBotiga}} </h2>
                        <p class="font-MinecraftRegular text-base text-zinc-600">@if($botiga->prime != 0) <span class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></span> @endif Botiga de {{$botiga->propietari->name}}</p>
                    </div>
                    <?php
                        $coordenades = explode("&",((explode("?",$botiga->Mapa))[1]));
                    ?>
                    <div>
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