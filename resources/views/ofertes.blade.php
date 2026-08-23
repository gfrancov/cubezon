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

        <div class="h-[250px] w-full bg-center bg-cover bg-no-repeat" style="background-image: url('/assets/img/anunci-llarg-7.png')">
        </div>

    </section>

        <!-- Productes -->
        <section class="flex justify-center items-center mt-20">

            <div class="lg:w-[960px] grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-3 mx-5 lg:mx-0">
                        <h2 class="text-4xl text-black font-MinecraftBold">Catàleg de productes d'oferta</h2>
                </div>
    
                @foreach ($productesEnOferta as $producte)
    
                    <div class="drop-shadow-lg hover:bg-amber-100/50 aspect-square flex justify-start items-center flex-col bg-white rounded-md p-5 lg:p-7 flex flex-col group">
                        <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-4">
                            <img class="h-32" src="{{$producte->Icona}}" alt="">
                        </a>
                        <div class="w-full">
                            <div class="flex">
                                <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}                                 @if(substr($producte->Descripcio, -6) == 'Oferta')
                                    <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                    @endif</a></h2>

                            </div>
                            @if($producte->Prime == 1)
                                <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                            @endif
                            <p class="font-MinecraftRegular">{{$producte->Descripcio}}</p>
                        </div>
                        <div class="font-MinecraftRegular w-full flex justify-between items-center mt-10">
                            <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                            <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                        </div>
                    </div>
                    
                @endforeach
    
            </div>
    
        </section>
    


    @include('includes.footer')
</body>
</html>