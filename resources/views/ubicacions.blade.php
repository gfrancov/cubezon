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

    

    <section class="flex justify-center items-center border my-24 mx-6 lg:mx-52">

        <div class="font-MinecraftRegular text-black">
            <p></p>
            <h1 class="text-3xl font-MinecraftBold mb-10">Locals de Cubezon</h1>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Poblenou.png')}}" class="rounded-md" alt="Local de Poblenou (Barcelona)">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Cubezon Poblenou (Barcelona)</h3>
                    <p class="mb-5">Oficines centrals de Cubezon a Catalunya al complex del Platinum BCN, amb oficines, sortida i gestió de paquetería i taquilles del Cubezon Locker.</p>
                    <p>Es troba al barri del Poblenou, al municipi de Barcelona. Es troba darrere la Torre Agbar. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:19497:65:22170:39:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>


            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Badalona.png')}}" class="rounded-md" alt="Local de Badalona">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Cubezon Badalona</h3>
                    <p class="mb-5">Primer local i magatzem central de Cubezon, compta amb recepció, botiga de <a class="text-sky-600 hover:underline" href="https://cubezon.gabi.work/botiga/Cubezon%20Basics">Cubezon Bàsics</a> i 8 taquilles lockers.</p>
                    <p>Es troba al centre de la ciutat de Badalona, just a la Plaça de la Vila en un gran edifici davant l'Ajuntament. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:19934:81:21517:26:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Tarrega.png')}}" class="rounded-md" alt="Local de Tàrrega">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Cubezon Tàrrega</h3>
                    <p class="mb-5">Local gourmet de Cubezon, compta amb recepció, botiga de <a class="text-sky-600 hover:underline" href="https://cubezon.gabi.work/botiga/Cubezon%20Xtra">Cubezon Xtra</a> amb selecció de productes xetats i 4 taquilles lockers.</p>
                    <p>Es troba a la ciutat de Tàrrega, just a una cantonada i amb un edifici clàsic i sofisticat. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:10994:151:18910:17:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Poblet.png')}}" class="rounded-md" alt="Local de Poblet">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Cubezon Poblet</h3>
                    <p class="mb-5">Local de Cubezon, compta amb botiga de Cubezon Trims i amb 3 taquilles de Cubezon Locker.</p>
                    <p>Es troba al municipi de Poblet. Ampli, modern i ubicat a la Plaça dels Monjos. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:9714:372:22095:22:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>


            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Eixample.png')}}" class="rounded-md" alt="Local de l'Eixample">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Locker Eixample (Barcelona)</h3>
                    <p class="mb-5">Local de Cubezon Locker amb 5 taquilles.</p>
                    <p>Es troba a l'Eixample a la ciutat de Barcelona, aprop del CC Les Arenes. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:18967:71:22381:39:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Cistella.png')}}" class="rounded-md" alt="Local de Cistella">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Locker Cistella</h3>
                    <p class="mb-5">Local de Cubezon Locker amb 3 taquilles.</p>
                    <p>Es troba al municipi de Cistella, petit i ubicat a la plaça central amb fàcil accés. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:25248:99:11417:12:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Andorra.png')}}" class="rounded-md" alt="Local de Andorra">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Locker Andorra</h3>
                    <p class="mb-5">Local de Cubezon Locker amb 4 taquilles.</p>
                    <p>Es troba al principat d'Andorra, petit i molt ben ubicat als baixos de l'Edifici Lisard. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:13403:154:9015:34:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/LaSeuUrgell.png')}}" class="rounded-md" alt="Local de La Seu">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Locker La Seu d'Urgell</h3>
                    <p class="mb-5">Local de Cubezon Locker amb 3 taquilles.</p>
                    <p>Es troba al municipi de La Seu d'Urgell, molt petit però molt ben ubicat al centre de la ciutat i aprop de l'aeroport. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:12996:144:10699:10:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>

            <div class="flex flex-col lg:flex-row items-center mb-16">

                <div class="lg:w-1/2">
                    <img src="{{asset('/assets/img/Oliana.png')}}" class="rounded-md" alt="Local de Oliana">
                </div>

                <div class="lg:w-1/2 p-5 rounded-md mb-10">
                    <h3 class="text-xl font-MinecraftBold mb-5">Locker Oliana</h3>
                    <p class="mb-5">Local de Cubezon Locker amb 3 taquilles.</p>
                    <p>Es troba al municipi d'Oliana, local de locker ampli ben ubicat al carrer principal. <a class="text-sky-600 hover:underline" target="_blank" href="https://mapa.cubecat.cat/#catalunya:11677:134:14042:10:0:0:0:1:flat">Obrir mapa</a>.</p>
                </div>

            </div>


        </div>

    </section>


    @include('includes.footer')
</body>
</html>
