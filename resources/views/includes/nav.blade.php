<nav class="fixed top-0 left-0 w-full z-30">
    <div class="bg-[#131921] text-white backdrop-blur-md h-[52px] lg:flex lg:justify-center lg:items-center" id="barra-nav">
      <ul class="justify-between items-center hidden md:flex mx-5 lg:w-[980px]">
        <li class="py-2 pr-4"><a aria-label="Cableando" class="flex justify-center items-center" href="/">
          <img src="{{asset('/assets/img/cubezon-prime-2.png')}}" class="w-32" alt=""></a>
        </li>
        <div class="flex">
          <li class="px-4 py-2">
            <a href="/llistat" class="cursor-pointer">
                <p class="font-MinecraftRegular text-xs text-gray-400 leading-[0.3em] mt-2">Llistar totes les <br/><span class="text-white text-base leading-1">Botigues</span></p>
            </a>
          </li>
          <li class="px-4 py-2 pr-0 flex justify-center items-center">

            <form action="/" id="form-cerca">
                
                <div class="flex rounded-md">
                    <input type="text" name="cerca" id="cerca" class="text-black font-MinecraftRegular px-2 py-1 rounded-l-sm" placeholder="Cerca a Cubezon">
                    <button type="submit" form="form-cerca" value="Submit" class="px-2 py-1 bg-[#febd69] hover:bg-[#ff9900] rounded-r-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                    </button>    
                </div>
            </form>

          </li>
          <li class="lg:w-[20vw] flex items-center justify-end">
            <a href="/gestio" class="flex items-center justify-center">
                <p class="font-MinecraftRegular text-xs text-gray-400 leading-[0.1em] mt-2">Gestionar<br/> <span class="text-white text-base leading-1">la meva botiga</span></p>
            </a>
          </li>
        </div>
      </ul>
      <div class="md:hidden mx-5 flex justify-between px-4 py-2"><a class="flex justify-center items-center group" href="/"><img src="{{asset('/assets/img/cubezon-prime-2.png')}}" class="w-32" alt=""></a><button onclick="mostrarMenu()" aria-label="Show menu" id="mostrar-menu"><svg xmlns="http://www.w3.org/2000/svg" class="fill-zinc-400 hover:fill-zinc-200" height="1em" viewBox="0 0 448 512">
            <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
            </path>
          </svg></button><button onclick="amagarMenu()" aria-label="Hide menu" id="amagar-menu" class="hidden"><svg xmlns="http://www.w3.org/2000/svg" class="fill-zinc-400 hover:fill-zinc-200" height="1em" viewBox="0 0 384 512">
            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z">
            </path>
          </svg></button></div>
    </div>
    <div id="menu-mobil" class="hidden min-h-[100vh] backdrop-blur-sm">
      <div class="bg-[#131921] backdrop-blur-md">
        <ul class="mx-5 py-4">
          <a class="" href="/"><li class="text-white font-MinecraftRegular px-4 py-2 text-lg">Inici</li></a>
          <!-- <a class="" target="_blank" href="https://plaza.cableando.net"><li class="text-black px-4 py-2 text-lg">Plaza</li></a> -->
          <a class="" href="/cerca"><li class="text-white font-MinecraftRegular px-4 py-2 text-lg">Cerca</li></a>
          <a class="" href="/gestio"><li class="text-white font-MinecraftRegular px-4 py-2 text-lg">Gestio de botigues</li></a>
        </ul>
      </div>
    </div>
</nav>