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

    <section class="flex justify-center items-center border my-24 min-h-[50vh] ">

        <div class="flex flex-col">
            <h1 class="text-4xl font-MinecraftBold text-black">No hem pogut trobar el que estaves buscant!</h1>
            <p class="text-lg font-MinecraftRegular text-zinc-600">Fes servir el cercador per trobar productes.</p>
        </div>

    </section>


    @include('includes.footer')
</body>
</html>
