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
    
    <section class="my-24 flex justify-center items-center mx-5 lg:mx-0">

        <div class="lg:w-[960px]">
            <h1 class="text-4xl font-MinecraftBold text-black mb-12">Preguntes freqüents</h1>
            <div class="my-8" id="que-es">
                <p class="font-MinecraftBold text-xl">1. Que es Cubezon?</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Cubezon es un catàleg de productes de diferents botigues existents de diferents usuaris de Cubecat. Cubezon com a tal no ven productes propis, si no que fem de distribuidor de diferents negocis del país.</p>
            </div>
            <div class="my-8" id="com-es-compra">
                <p class="font-MinecraftBold text-xl">2. Com es compra?</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Per ara no es pot comprar online, tot i que estem treballant per fer-ho. Nomes es podran comprar online els productes amb l'etiqueta prime (<span class="text font-MinecraftBold text-sm text-amber-700">✔<span class="text-xs text-sky-600">prime</span></span>), que son de les botigues habilitades per Cubezon.</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Tot i així us facilitem totes les dades necessàries de la botiga per trobar-la, o contactar amb el seu propietari per poder comprar el producte.</p>
            </div>
            <div class="my-8" id="cercador">
                <p class="font-MinecraftBold text-xl">3. Com funciona el cercador?</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Pots cercar amb el cercador de Cubezon pel nom del producte, Descripcio, nom de la botiga.</p>
            </div>
            <div class="my-8" id="afegir-botiga">
                <p class="font-MinecraftBold text-xl">4. Com puc afegir la meva botiga?</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Un dels requisits de les botigues es que siguin temàtiques, tot i que es pot afegir diverses botigues per usuari. Podem donar d'alta la teva botiga i que ho puguis fer servir com a catàleg, haurem de verificar la teva botiga si vols que es puguin fer comandes online o enviaments amb Cubezon.</p>
            </div>
            <div class="my-8" id="com-es-compra">
                <p class="font-MinecraftBold text-xl">5. Vull taquilles de Cubezon al meu municipi</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Contacta'ns al discord (rojoCaotico) si tens pensat un local per Cubezon, on nosaltres afegiriem taquilles pels enviaments de les comandes online, digues-ho i parlem d'un preu.</p>
            </div>
            <div class="my-8" id="com-es-compra">
                <p class="font-MinecraftBold text-xl">6. Anuncis al nostre web</p>
                <p class="font-MinecraftRegular text-lg text-zinc-700">Si vols afegir anuncis a la nostra pàgina inicial, com l'actual campanya de "Badalona, ciutat de primera", contacta'ns tambe al discord (rojoCaotico). El preu base es de 500$ per dia de duració de la campanya publicitaria, a mes que oferim tambe disseny d'imatges i continguts per campanyes.</p>
            </div>
        </div>

    </section>

@include('includes.footer')
</body>
</html>