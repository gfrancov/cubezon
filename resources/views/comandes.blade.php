<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comandes') }}
        </h2>
    </x-slot>

    <div class="lg:mx-12 bg-white p-5 lg:p-10 md:rounded-md my-10">
        <h2 class="font-MinecraftBold text-3xl mb-5">Enviaments</h2>
        <div class="border rounded-md overflow-x-auto" data-id="6">
            <div class="relative w-full overflow-auto">
                <table class="w-full caption-bottom text-sm" data-id="7">
                    <thead class="[&amp;_tr]:border-b bg-black text-white" data-id="8">
                        <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                            data-id="9">
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground w-[100px]"
                                data-id="10">ID</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                data-id="11">Client</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                data-id="12">Data</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                data-id="13">Total</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                data-id="15">Empresa de lliurament</th>
                            <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground"
                                data-id="16">Adreça de lliurament</th>
                            <th class="h-12 px-4 align-middle font-medium text-muted-foreground text-right"
                                data-id="17">Accions</th>
                        </tr>
                    </thead>
                    <tbody class="[&amp;_tr:last-child]:border-0" data-id="18">

                        @foreach ($llistatComandes as $comanda)
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted"
                                data-id="19">
                                <td class="p-4 align-middle font-medium" data-id="20">
                                    {{$comanda->id}}</td>
                                <td class="p-4 align-middle" data-id="21">{{$comanda->NomUsuari}}</td>
                                <td class="p-4 align-middle" data-id="22">{{date('j \d\e F', strtotime($comanda->DataComanda))}}
                                </td>
                                <td class="p-4 align-middle" data-id="23">{{$comanda->Total}} €</td>
                                <td class="p-4 align-middle" data-id="26">
                                    <div class="flex items-center px-1.5 py-1 rounded-full text-xs @if($comanda->Empresa == 'Pendent assignació') bg-orange-500 @else bg-green-600 @endif" data-id="27">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="lucide lucide-truck w-4 h-4 mr-2 text-muted-foreground" data-id="28">
                                            <path d="M14 18V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h2"></path>
                                            <path d="M15 18H9"></path>
                                            <path
                                                d="M19 18h2a1 1 0 0 0 1-1v-3.65a1 1 0 0 0-.22-.624l-3.48-4.35A1 1 0 0 0 17.52 8H14">
                                            </path>
                                            <circle cx="17" cy="18" r="2"></circle>
                                            <circle cx="7" cy="18" r="2"></circle>
                                        </svg>
                                        {{$comanda->Empresa}}
                                    </div>
                                </td>
                                <td class="p-4 align-middle" data-id="29">
                                    <div class="flex items-center cursor-help" data-id="33" data-state="closed"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-map-pin w-4 h-4 mr-2 text-muted-foreground"
                                            data-id="34">
                                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                            <circle cx="12" cy="10" r="3"></circle>
                                        </svg>{{$comanda->Ubicacio}}</div>
                                </td>
                                <td class="p-4 align-middle text-right" data-id="37">
                                    <a href="{{route('gestio.gestionarComanda', ['id' => $comanda->id])}}" class="flex hover:opacity-75"><svg class="w-5 fill-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M58.9 42.1c3-6.1 9.6-9.6 16.3-8.7L320 64 564.8 33.4c6.7-.8 13.3 2.7 16.3 8.7l41.7 83.4c9 17.9-.6 39.6-19.8 45.1L439.6 217.3c-13.9 4-28.8-1.9-36.2-14.3L320 64 236.6 203c-7.4 12.4-22.3 18.3-36.2 14.3L37.1 170.6c-19.3-5.5-28.8-27.2-19.8-45.1L58.9 42.1zM321.1 128l54.9 91.4c14.9 24.8 44.6 36.6 72.5 28.6L576 211.6l0 167c0 22-15 41.2-36.4 46.6l-204.1 51c-10.2 2.6-20.9 2.6-31 0l-204.1-51C79 419.7 64 400.5 64 378.5l0-167L191.6 248c27.8 8 57.6-3.8 72.5-28.6L318.9 128l2.2 0z"/></svg>&nbsp;Gestionar</a></td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
