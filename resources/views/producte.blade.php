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
                <h1 class="text-4xl font-MinecraftBold text-black" style="text-wrap:balance;">{{$producte->NomProducte}}</h1>
                @if($producte->botiga->propietari->name == 'Adminshop')
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
                        <h3 class="text-xl font-MinecraftBold text-zinc-800">{{$producte->botiga->NomBotiga}}</h3>

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