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

    <section>
        <a href="/badalona">
            <div class="hidden lg:block h-[300px] mt-[52px] bg-center bg-cover bg-no-repeat" style="box-shadow: 0 0 0 1px transparent;background-clip: border-box;outline: 1px solid transparent;background-image:linear-gradient(to top, rgb(228, 228, 231),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url({{asset('/assets/img/anunci-llarg.png')}})">
            </div>
            <div class="block lg:hidden h-[300px] mt-[52px] bg-top bg-cover bg-no-repeat" style="box-shadow: 0 0 0 1px transparent;background-clip: border-box;outline: 1px solid transparent;background-image:linear-gradient(to top, rgb(228, 228, 231),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url({{asset('/assets/img/anunci-petit.png')}})">
            </div>
        </a>
    </section>

    <!-- Productes -->
    <section class="flex justify-center items-center -mt-12 mb-32 pb-12">

        <div class="lg:w-[960px] grid grid-cols-1 lg:grid-cols-3 gap-6">

            @foreach ($productes as $producte)

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