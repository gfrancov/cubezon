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

    
    <section class="mt-[48px] flex flex-col justify-center items-center px-5 lg:px-0">
        <div class="lg:w-[960px] my-2">
            <p class="font-MinecraftRegular text-xs px-2 py-1 rounded-md text-zinc-600 opacity-50">PUBLICITAT: Això es un anunci publicitari dels nostres patrocinadors/col·laboradors. Si tambe vols anunciar-te contacta'ns.</p>
        </div>

        <div class="lg:w-[960px] grid grid-cols-1 lg:grid-cols-3 gap-6 py-24 border-b border-zinc-300">

            <div class="flex justify-center items-start flex-col">
                <h1 class="font-MinecraftBold text-black text-4xl mb-5">Benvinguts a <span class="text-sky-700">Badalona</span>!</h1>
                <p class="font-MinecraftRegular text-zinc-600 text-base">Badalona es el lloc ideal per a tu! Situada a la vora del mar, la nostra ciutat ofereix una combinació única de tranquil·litat costanera i dinamisme urbà.</p>
            </div>

            <div class="bg-white lg:rounded-md lg:drop-shadow-lg p-6">
                <img class="mb-5" src="{{asset('/assets/img/bdn-locals-pisos.png')}}" alt="Logo Badalona locals i pisos">
                <h3 class="font-MinecraftBold text-black text-2xl mb-2">Pisos i locals</h3>
                <p class="font-MinecraftRegular text-zinc-800 text-base">Actualment, tenim disponibles pisos amb vistes espectaculars a la nostra preciosa platja, així com locals comercials perfectament situats al cor de la ciutat.</p>
            </div>

            <div class="bg-white lg:rounded-md lg:drop-shadow-lg p-6">
                <img class="rounded-md mb-5" src="{{asset('/assets/img/rambla-badalona.png')}}" alt="Rambla de Badalona">
                <p class="font-MinecraftRegular text-zinc-800 text-base">La Rambla, amb els seus cafes i botigues, es el lloc perfecte per gaudir del teu temps lliure i connectar amb altres jugadors.</p>
            </div>

        </div>

    </section>

    <section class="flex justify-center items-center border my-24">

        <div class="lg:w-[680px] font-MinecraftRegular text-black">
            <p></p>
            <p class="mb-5">Benvolguts veïns i veïnes de Cubecat,</p>
            <p class="mb-5">Com a alcalde de Badalona a Cubecat, es per a mi un plaer anunciar la nostra col·laboració amb Cubezon, la plataforma que transformarà el comerç dins de Cubecat.</p>
            <p class="mb-5">Hem decidit oferir el primer edifici de Cubezon a la nostra ciutat perque creiem en el seu potencial per millorar la vida dels nostres ciutadans.</p>
            <p class="mb-5">Aquesta col·laboració reforçarà Badalona com un centre d'activitat i innovació dins del servidor</p>
            <p class="mb-5">Vull agrair-vos a tots el vostre suport i confiança en aquest nou projecte, que de ben segur portarà grans exits per a la nostra estimada ciutat.</p>
            <p class="mb-10">Atentament,</p>
            <p class="font-MinecraftBold">rojoCaotico</p>
            <p>Alcalde de Badalona a Cubecat</p>
        </div>

    </section>


    @include('includes.footer')
</body>
</html>
