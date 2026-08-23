@php
    
$preuEnviament = 0;

@endphp
<x-app-layout>
    <div class="flex justify-center items-center">
        <div class="mx-12 w-[60vw] bg-white p-10 rounded-md my-10">
            <a href="/comandes" class="flex text-sky-600 font-MinecraftRegular">
                <svg class="w-3 fill-sky-600 mr-2" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M459.5 440.6c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29l0-320c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4L288 214.3l0 41.7 0 41.7L459.5 440.6zM256 352l0-96 0-128 0-32c0-12.4-7.2-23.7-18.4-29s-24.5-3.6-34.1 4.4l-192 160C4.2 237.5 0 246.5 0 256s4.2 18.5 11.5 24.6l192 160c9.5 7.9 22.8 9.7 34.1 4.4s18.4-16.6 18.4-29l0-64z" />
                </svg>
                Tornar enrere
            </a>
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-id="2" data-v0-t="card">
                <div class="flex flex-col space-y-1.5 p-6" data-id="3">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4" data-id="4">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight" data-id="5">Vista de la comanda
                            #{{$comanda->id}}</h3>
                        <div class="inline-flex items-center text-white @if($comanda->EstatComanda == 'Confirmat') bg-orange-600 @elseif($comanda->EstatComanda == 'Cancel·lat') bg-red-700 @elseif($comanda->EstatComanda == 'Lliurat') bg-green-700 @else bg-zinc-700 @endif rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                            data-id="6" data-v0-t="badge">{{$comanda->EstatComanda}}</div>
                    </div>
                </div>
                <div class="p-6 pt-0" data-id="7">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6" data-id="8">
                        <div class="space-y-4" data-id="9">
                            <div class="flex items-center space-x-2" data-id="10"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-truck h-5 w-5 text-muted-foreground" data-id="11">
                                    <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                    <path d="M15 18H9"></path>
                                    <path
                                        d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14">
                                    </path>
                                    <circle cx="17" cy="18" r="2"></circle>
                                    <circle cx="7" cy="18" r="2"></circle>
                                </svg><span class="font-semibold" data-id="12">Empresa:</span><span
                                    data-id="13">{{$comanda->Empresa}}</span></div>
                            <div class="flex items-start space-x-2" data-id="14"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-map-pin h-5 w-5 text-muted-foreground" data-id="15">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <div data-id="16"><span class="font-semibold" data-id="17">Adreça de Lliurament:</span>
                                    <p class="text-sm text-muted-foreground" data-id="18">{{$comanda->Ubicacio}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4" data-id="19">
                            <div class="flex items-center space-x-2" data-id="20"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-user h-5 w-5 text-muted-foreground" data-id="21">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg><span class="font-semibold" data-id="22">Client:</span><span data-id="23">{{$comanda->NomUsuari}}</span></div>
                        </div>
                    </div>
                    <div class="mt-6" data-id="25">
                        <h3 class="text-lg font-semibold mb-2" data-id="26">Items de la comanda</h3>
                        <div class="relative w-full overflow-auto">
                            <table class="w-full caption-bottom text-sm" data-id="27">
                                <thead class="[&amp;_tr]:border-b" data-id="28">
                                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                        data-id="29">
                                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0"
                                            data-id="30">Item i botiga</th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="31">Quantitat</th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="32">Preu</th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="33">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="[&amp;_tr:last-child]:border-0" data-id="34">

                                    @foreach ($comanda->detalls as $detall)
                                        
                                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                        data-id="35">
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0" data-id="36">
                                            {{$detall->producte->NomProducte}} (botiga <a class="text-sky-600 hover:underline" target="_blank" href="/botiga/{{$detall->producte->botiga->NomBotiga}}">{{$detall->producte->botiga->NomBotiga}}</a>)</td>
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="37">{{$detall->Quantitat}}</td>
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="38">{{$detall->PreuUnitari}}€</td>
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="39">{{number_format((float)$detall->Quantitat * $detall->PreuUnitari, 2, '.', '')}}€
                                        </td>
                                        @php $preuEnviament += $detall->Quantitat * $detall->PreuUnitari @endphp
                                    </tr>
                                    @endforeach
                                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                        data-id="40">
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            colspan="3" data-id="41">Guanys enviament:</td>
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 text-right"
                                            data-id="42">{{number_format((float)$comanda->Total - $preuEnviament, 2, '.', '')}}€</td>
                                    </tr>
                                    <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                        data-id="40">
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-semibold text-right"
                                            colspan="3" data-id="41">Preu final:</td>
                                        <td class="p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 font-semibold text-right"
                                            data-id="42">{{number_format((float)$comanda->Total, 2, '.', '')}}€</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-wrap gap-4 justify-end" data-id="43"><a href="{{route('gestio.cancelarComanda', ['id' => $comanda->id])}}"
                            class="inline-flex items-center justify-center bg-red-600 text-white gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-destructive text-destructive-foreground hover:bg-destructive/90 h-10 px-4 py-2"
                            data-id="46" type="button" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="radix-:r3:" data-state="closed">Cancelar comanda</a>
                            @if($comanda->Empresa == 'Pendent assignació')
                            <a href="{{route('gestio.agafarComanda', ['id' => $comanda->id])}}"
                            class="inline-flex bg-zinc-700 text-white items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
                            data-id="54">Assumir comanda</a>
                            @elseif($comanda->EstatComanda != 'Lliurat')

                                <form action="{{route('gestio.comandaLliurada')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{$comanda->id}}">
                                    <input class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2" type="text" name="taquilla" id="taquilla" placeholder="Taquilla lliurada">
                                    <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 bg-green-700 text-white" type="submit">Comanda lliurada</button>
                                </form>

                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>