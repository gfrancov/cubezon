<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{asset('/assets/img/cubezon.png')}}">
    <title>Cubezon | Cistella</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-zinc-200">
@include('includes.nav')
    
    <section class="mt-[48px] flex justify-center items-center px-5 lg:px-0">

        <div class="lg:w-[960px] py-12 flex flex-col justify-center items-start">

            <div class="mt-20 w-full mb-10">
            
                @if(empty($cistella))
                    <h1 class="font-MinecraftBold text-black text-4xl">La teva cistella de Cubezon està buida.</h1>
                @else

                    <div class="bg-white p-5">

                        <div class="flex justify-between">
                            <div>
                                <h1 class="font-MinecraftBold text-black text-3xl">La teva cistella</h1>
                                <a href="{{ route('cistella.clear') }}" class="font-MinecraftRegular text-sky-600 hover:underline">Anular la selecció de tots els articles</a>        
                            </div>
                            <div class="flex flex-col items-end justify-end justify-items-end items-end">
                                <img class="w-16 h-16" src="https://mc-heads.net/avatar/{{$username ?? 'Steve'}}/50" alt="">
                                @if($username)
                                    <p class="text-base font-MinecraftRegular text-zinc-800">{{$username}}</p>
                                    <a class="text-sky-600 text-xs font-MinecraftRegular hover:underline" href="{{route('cistella.removeUsername')}}">Canviar usuari</a>    
                                @endif
                            </div>
                        </div>

                        <div class="mt-5 @if($username) hidden @endif" id="form-username">
                            <form action="{{ route('cistella.setUsername') }}" class="flex items-center" method="POST">
                                @csrf
                                <div class="">
                                    <label for="username" class="text-xs font-MinecraftRegular text-zinc-700">Nom d'usuari a Cubecat</label><br/>
                                    <input type="text" class="font-MinecraftRegular px-2 py-1 rounded-md border-zinc-400 text-zinc-600" id="username" name="username" value="{{ $username ?? '' }}" required>
                                </div>
                                <button type="submit" class="bg-sky-600 hover:bg-sky-500 ml-2 text-white font-MinecraftRegular mt-6 px-3 py-1 rounded-md">Desar nom</button>
                            </form>                        
                        </div>

                        <div class="mt-5 @if($ubicacio) hidden @endif" id="form-ubicacio">
                            <form action="{{ route('cistella.setUbicacio') }}" class="flex items-center" method="POST">
                                @csrf
                                <div class="">
                                    <label for="username" class="text-xs font-MinecraftRegular text-zinc-700">On vols recollir la comanda?</label><br/>
                                    <select class="font-MinecraftRegular px-2 pr-10 py-1 rounded-md border-zinc-400 text-zinc-600" name="ubicacio" id="ubicacio">
                                        <option value="Cubezon Plaça Catalunya (Barcelona)">Cubezon Plaça Catalunya (Barcelona)</option>
                                        <option value="Cubezon Poblenou (Barcelona)">Cubezon Poblenou (Barcelona)</option>
                                        <option value="Locker Eixample (Barcelona)">Locker Eixample (Barcelona)</option>
                                        <option value="Cubezon Badalona">Cubezon Badalona</option>
                                        <option value="Cubezon Tàrrega">Cubezon Tàrrega</option>
                                        <option value="Cubezon Poblet">Cubezon Poblet</option>
                                        <option value="Cubezon Cistella">Cubezon Cistella</option>
                                        <option value="Locker Andorra">Locker Andorra</option>
                                        <option value="Locker La Seu d'Urgell">Locker La Seu d'Urgell</option>
                                        <option value="Locker Oliana">Locker Oliana</option>

                                    </select>
                                    <p><a class="text-xs text-sky-600 hover:underline font-MinecraftRegular" href="https://cubezon.gabi.work/ubicacions">Veure ubicacions de Cubezon</a></p>
                                </div>
                                <button type="submit" class="bg-sky-600 hover:bg-sky-500 ml-2 text-white font-MinecraftRegular mt-0 px-3 py-1 rounded-md">Establir ubicació</button>
                            </form>
                        </div>
                        
                        @if($ubicacio)
                        <div class="flex">
                            <svg class="w-6 mr-2 fill-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M215.7 499.2c11-13.8 25.1-31.7 40.3-52.3l0-94.8c0-23.7 12.9-44.4 32-55.4l0-24.6c0-55.6 40.5-101.7 93.6-110.5C367 70 287.7 0 192 0C86 0 0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM400 240c17.7 0 32 14.3 32 32l0 48-64 0 0-48c0-17.7 14.3-32 32-32zm-80 32l0 48c-17.7 0-32 14.3-32 32l0 128c0 17.7 14.3 32 32 32l160 0c17.7 0 32-14.3 32-32l0-128c0-17.7-14.3-32-32-32l0-48c0-44.2-35.8-80-80-80s-80 35.8-80 80z"/></svg>
                            <p class="font-MinecraftRegular text-lg text-black">Enviament a <span class="font-MinecraftBold">{{$ubicacio}}</span></p>
                        </div>
                        <p class="ml-4 text-sm text-sky-600 hover:underline font-MinecraftRegular"><a href="{{route('cistella.removeUbicacio')}}">Canviar ubicació d'enviament</a></p>
                        @endif

                        <p class="mt-6 lg:pr-5 text-right text-zinc-600 font-MinecraftRegular">Preu</p>

                        @foreach ($cistella as $id => $item)
    
                            <div class="lg:px-5 py-3 border-y flex justify-between">
                                
                                <div class="flex flex-col lg:flex-row justify-center lg:justify-start lg:items-center">
                                    <img src="{{$item['icona']}}" class="w-32 lg:mr-5" alt="{{$item['nom']}}">

                                    <div class="font-MinecraftRegular text-sm">
                                        <h2 class="text-2xl font-MinecraftBold text-zinc-800">{{$item['nom']}}</h2>
                                        @if($item['prime'] == '1')
                                            <p class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></p>
                                        @endif
                                        <div class="mt-5">
                                            <form action="{{ route('cistella.update', $id) }}" method="GET" style="display:inline-block;">
                                                @csrf
                                                <input type="number" class="py-1 px-3 text-sm font-MinecraftRegular rounded-md border-zinc-400 text-zinc-500" name="quantitat" value="{{ $item['quantitat'] }}" min="1" max="{{$item['estoc']}}">
                                                <button type="submit" class="text-sky-600 hover:underline">Actualizar quantitat</button>
                                            </form>
                                            |
                                            <a href="{{ route('cistella.remove', $id) }}" class="text-sky-600 hover:underline">Treure de la cistella</a>
                                        </div>
                                    </div>    
                                </div>

                                <div class="w-auto flex text-right">
                                    <p class="font-MinecraftBold text-2xl">@php echo number_format((float)$item['subtotal'], 2, ',', ''); @endphp €</p>
                                </div>

                            </div>

                        @endforeach
                        
                        <div class="w-full flex justify-between border-b py-8 ">

                            <div class="lg:w-2/3 text-right">
                                <p class="font-MinecraftRegular text-lg">Cost de l'enviament</p>
                                <p class="text-zinc-500 text-sm font-MinecraftRegular">(Gratuit amb un producte prime)</p>
                            </div>
                            

                            <div class="lg:w-1/3 text-right">
                                @if($prime)
                                <span class="font-MinecraftBold text-2xl"> 0,00 € </span>
                                @else
                                    <span class="font-MinecraftBold text-2xl"> 250,00 € </span>
                                @endif
                            </div>

                        </div>

                        <div class="text-right lg:pr-5 mt-4">
                            <p class="font-MinecraftRegular text-2xl">Preu total de la compra: <span class="font-MinecraftBold"> @php echo number_format((float)$preuFinal, 2, ',', ''); @endphp € </span></p>
                            <div class="flex hover:cursor-pointer justiy-center items-center" onclick="alert('Pastisset trobat: 34235')">
                                <img src="{{asset('/pastissets/MoraMistica.png')}}" class="w-10 mr-3" alt="Pastisset Mora Mística">
                                <p class="font-MinecraftBold text-fuchsia-800">Mora Mística</p>
                            </div>
                        </div>

                        <div class="mt-6">
                            <a class="" href="{{ route('comandas.store') }}"><p class="text-xl font-MinecraftRegular py-4 text-center hover:bg-yellow-400 bg-yellow-500 rounded-md">Tramitar comanda i pagar</p></a>
                        </div>
    

                    </div>

                                
                @endif
            </div>
            

        </div>

    </section>

@include('includes.footer')
</body>
</html>