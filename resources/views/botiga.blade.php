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

    <!-- Productes -->
    <section class="flex flex-col justify-center items-center mt-[48px] mb-12">

        <div class="h-[250px] w-full bg-center bg-cover bg-no-repeat" style="background-image: url({{asset($botiga->Imatge)}})">
        </div>

        <div class="-mt-28 lg:w-[960px] px-5 lg:px-0 flex flex-col lg:flex-row items-center">
            
            <img src="{{asset($botiga->Logo)}}" class="w-48 bg-white rounded-full lg:mr-10 border-8 border-zinc-200" alt="Logo Cal Bruixot">
            <div class="mt-10 lg:mt-32">
                <h1 class="font-MinecraftBold text-4xl lg:text-6xl">{{$botiga->NomBotiga}}</h1>
                <p class="font-MinecraftRegular text-zinc-500 text-lg">{{$botiga->Descripcio}}</p>
            </div>
            

        </div>

    </section>

    <section class="flex justify-center items-center">

        <div class="lg:w-[960px] flex flex-col lg:flex-row justify-between items-start">

            @if($botiga->propietari->name != 'Adminshop')
                    <div class="w-full lg:w-1/2 flex justify-start items-center p-6 bg-white lg:rounded-md lg:mx-3 mb-10 lg:mb-0 lg:drop-shadow-lg">
                        <img class="mr-4" src="https://mc-heads.net/avatar/{{$botiga->propietari->name}}/80" alt="">
                        <div>
                            <h2 class="font-MinecraftBold text-zinc-800 text-2xl">{{$botiga->propietari->name}}</h2>
                            <p class="font-MinecraftRegular text-zinc-500 text-base">Propietari/a de la botiga</p>    
                        </div>
                    </div>                    
            @else
                    <div class="w-full lg:w-1/2 flex justify-center items-center p-6 bg-white lg:rounded-md lg:mx-3 lg:drop-shadow-lg">
                        <img class="mr-4" src="https://pbs.twimg.com/profile_images/1703022680704790528/AwSKSa1Y_80x80.jpg" alt="">
                        <div>
                            <h2 class="font-MinecraftBold text-zinc-800 text-2xl">Generalitat de Cubecat</h2>
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                            <p class="font-MinecraftRegular text-zinc-500 text-base">Botiga oficial del servidor</p>
                        </div>
                    </div>                    
            @endif

            <?php

                $coordenades = explode("&",((explode("?",$botiga->Mapa))[1]));

            ?>
            <div class="lg:w-1/2 bg-white lg:mx-3 p-5 font-MinecraftRegular text-sm text-zinc-600 lg:rounded-md lg:drop-shadow-lg">
                <p>Ubicada a {{$botiga->Municipi}}. Coordenades: {{$coordenades[3]}} {{$coordenades[5]}}</p>
                <iframe src="{{$botiga->Mapa}}" class="w-full h-[50vh]" frameborder="0"></iframe>
            </div>
        </div>

    </section>

        <!-- Productes -->
        <section class="flex justify-center items-center mt-20">

            <div class="lg:w-[960px] grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-3 mx-5 lg:mx-0">
                    <h2 class="text-4xl text-black font-MinecraftBold">Productes d'aquesta botiga</h2>
                </div>
    
                @foreach ($botiga->productes as $producte)
    
                    <div class="drop-shadow-lg hover:bg-amber-100/50 aspect-square flex justify-start items-center flex-col bg-white rounded-md p-5 lg:p-7 flex flex-col group">
                        <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-4">
                            <img class="h-32" src="{{$producte->Icona}}" alt="">
                        </a>
                        <div class="w-full">
                            <h2 class="font-MinecraftBold text-black text-xl group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}</a></h2>
                            <p class="font-MinecraftRegular">{{$producte->Descripcio}}</p>
                        </div>
                        <div class="font-MinecraftRegular w-full flex justify-between items-center mt-10">
                            <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                            <p class="text-zinc-500 text-xs"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                        </div>
                    </div>
                    
                @endforeach
    
            </div>
    
        </section>
    


    @include('includes.footer')
</body>
</html>