<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/cubezon.png')}}">
    <title>Cubezon | Inici</title>
    @vite('resources/css/app.css')
    <style>
        
        @media only screen and (max-width: 768px) {
        /* For mobile phones: */
            .diapositives {
                width: 100% !important;
            }
            swiper-container {
                max-width: 100vw !important;
            }
        }
    </style>
</head>
<body class="bg-zinc-200">
  @include('includes.nav')

    <section>
        <a href="/botiga/Cubezon%20Circuit">
            <div class="hidden lg:block h-[300px] mt-[52px] bg-center bg-cover bg-no-repeat" style="box-shadow: 0 0 0 1px transparent;background-clip: border-box;outline: 1px solid transparent;background-image:linear-gradient(to top, rgb(228, 228, 231),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url({{asset('/assets/img/anunci-llarg-6.png')}})">
            </div>
            <div class="block lg:hidden h-[300px] mt-[52px] bg-top bg-cover bg-no-repeat" style="box-shadow: 0 0 0 1px transparent;background-clip: border-box;outline: 1px solid transparent;background-image:linear-gradient(to top, rgb(228, 228, 231),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0),rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), url({{asset('/assets/img/anunci-petit-6.png')}})">
            </div>
        </a>
    </section>

    <!-- Productes -->
    <section class="flex justify-center items-center -mt-12 mb-6 pb-12">

        <swiper-container pagination="true" scrollbar-hide="true" centered-slides="false" space-between="30" grab-cursor="true" slides-per-view="4" class="lg:w-[980px] swiper">

            @foreach ($ofertas as $oferta)
                <swiper-slide style="width: 250px !important" class="diapositives drop-shadow-lg hover:bg-amber-100/50 flex justify-start items-center flex-col bg-white rounded-md p-5 lg:p-7 flex flex-col group">
                    <a href="/producte/{{$oferta->id}}" class="flex justify-center items-center mb-4">
                        <img class="h-32" src="{{$oferta->Icona}}" alt="">
                    </a>
                    <div class="w-full">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$oferta->id}}" >{{$oferta->NomProducte}}                             @if(substr($oferta->Descripcio, -6) == 'Oferta')
                                <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                @endif</a></h2>

                        </div>
                        @if($oferta->Prime == 1)
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                        @endif
                    </div>
                    <div class="font-MinecraftRegular w-full flex justify-between items-center mt-4">
                        <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$oferta->Preu}}$</p>
                        <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$oferta->botiga->NomBotiga}}">{{$oferta->botiga->NomBotiga}}</a>, {{$oferta->botiga->Municipi}}</p>
                    </div>
                </swiper-slide>

            @endforeach

        </swiper-container>

    </section>

    <section class="flex flex-col justify-center items-center mb-6 py-4 bg-white max-w-[100vw]">
        <div class="flex flex-col lg:flex-row justify-between items-center lg:w-[980px] mb-6">
            <h2 class="text-2xl font-MinecraftBold">Encantaments mes venuts</h2>
            <p><a class="text-sky-600 font-MinecraftRegular hover:underline" href="/categoria/8">Veure tots els encantaments</a></p>
        </div>
        <swiper-container centered-slides="true" scrollbar-hide="true" space-between="30" grab-cursor="true" slides-per-view="4" class=" lg:w-[98.7vw] swiper">

            @foreach ($encantaments as $producte)
                <swiper-slide class="diapositives hover:bg-amber-100/50 flex justify-start items-center flex-col bg-white p-4 flex flex-col group">
                    <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-2">
                        <img class="h-32" src="{{$producte->Icona}}" alt="">
                    </a>
                    <div class="w-full">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}                             @if(substr($producte->Descripcio, -6) == 'Oferta')
                                <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                @endif</a></h2>

                        </div>
                        @if($producte->Prime == 1)
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                        @endif
                    </div>
                    <div class="font-MinecraftRegular w-full flex justify-between items-center mt-2">
                        <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                        <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                    </div>
                </swiper-slide>

            @endforeach

        </swiper-container>
    </section>

    <section class="flex flex-col justify-center items-center mb-6 py-4 bg-white max-w-[100vw]">
        <div class="flex flex-col lg:flex-row justify-between items-center lg:w-[980px] mb-6">
            <h2 class="text-2xl font-MinecraftBold">Blocs mes venuts</h2>
            <p><a class="text-sky-600 font-MinecraftRegular hover:underline" href="/categoria/3">Veure tots els blocs</a></p>
        </div>
        <swiper-container centered-slides="true" scrollbar-hide="true" space-between="30" grab-cursor="true" slides-per-view="4" class=" lg:w-[98.7vw] swiper">

            @foreach ($blocs as $producte)
                <swiper-slide class="diapositives hover:bg-amber-100/50 flex justify-start items-center flex-col bg-white p-4 flex flex-col group">
                    <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-2">
                        <img class="h-32" src="{{$producte->Icona}}" alt="">
                    </a>
                    <div class="w-full">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}                             @if(substr($producte->Descripcio, -6) == 'Oferta')
                                <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                @endif</a></h2>

                        </div>
                        @if($producte->Prime == 1)
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                        @endif
                    </div>
                    <div class="font-MinecraftRegular w-full flex justify-between items-center mt-2">
                        <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                        <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                    </div>
                </swiper-slide>

            @endforeach

        </swiper-container>
    </section>


    <section class="flex flex-col justify-center items-center mb-6 py-4 bg-white max-w-[100vw]">
        <div class="flex flex-col lg:flex-row justify-between items-center lg:w-[980px] mb-6">
            <h2 class="text-2xl font-MinecraftBold">Eines mes venudes</h2>
            <p><a class="text-sky-600 font-MinecraftRegular hover:underline" href="/categoria/7">Veure totes les eines</a></p>
        </div>
        <swiper-container centered-slides="true" scrollbar-hide="true" space-between="30" grab-cursor="true" slides-per-view="4" class=" lg:w-[98.7vw] swiper">

            @foreach ($eines as $producte)
                <swiper-slide class="diapositives hover:bg-amber-100/50 flex justify-start items-center flex-col bg-white p-4 flex flex-col group">
                    <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-2">
                        <img class="h-32" src="{{$producte->Icona}}" alt="">
                    </a>
                    <div class="w-full">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}                             @if(substr($producte->Descripcio, -6) == 'Oferta')
                                <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                @endif</a></h2>

                        </div>
                        @if($producte->Prime == 1)
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                        @endif
                    </div>
                    <div class="font-MinecraftRegular w-full flex justify-between items-center mt-2">
                        <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                        <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                    </div>
                </swiper-slide>

            @endforeach

        </swiper-container>
    </section>


    <section class="flex flex-col justify-center items-center mb-6 py-4 bg-white max-w-[100vw]">
        <div class="flex flex-col lg:flex-row justify-between items-center lg:w-[980px] mb-6">
            <h2 class="text-2xl font-MinecraftBold">Menjar mes venut</h2>
            <p><a class="text-sky-600 font-MinecraftRegular hover:underline" href="/categoria/4">Veure tot el menjar</a></p>
        </div>
        <swiper-container centered-slides="true" scrollbar-hide="true" space-between="30" grab-cursor="true" slides-per-view="4" class=" lg:w-[98.7vw] swiper">

            @foreach ($menjar as $producte)
                <swiper-slide class="diapositives hover:bg-amber-100/50 flex justify-start items-center flex-col bg-white p-4 flex flex-col group">
                    <a href="/producte/{{$producte->id}}" class="flex justify-center items-center mb-2">
                        <img class="h-32" src="{{$producte->Icona}}" alt="">
                    </a>
                    <div class="w-full">
                        <div class="flex">
                            <h2 class="font-MinecraftBold text-black text-xl mr-3 group-hover:underline"><a href="/producte/{{$producte->id}}" >{{$producte->NomProducte}}                             @if(substr($producte->Descripcio, -6) == 'Oferta')
                                <span class="text-sm text-white px-2 py-1 bg-red-700 rounded-sm font-MinecraftBold">OFERTA</span>
                                @endif</a></h2>

                        </div>
                        @if($producte->Prime == 1)
                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                        @endif
                    </div>
                    <div class="font-MinecraftRegular w-full flex justify-between items-center mt-2">
                        <p class="font-MinecraftBold text-green-800 text-xl leading-1">{{$producte->Preu}}$</p>
                        <p class="text-zinc-500 text-xs text-right"><a class="hover:underline" href="/botiga/{{$producte->botiga->NomBotiga}}">{{$producte->botiga->NomBotiga}}</a>, {{$producte->botiga->Municipi}}</p>
                    </div>
                </swiper-slide>

            @endforeach

        </swiper-container>
    </section>


    @include('includes.footer')
</body>
</html>