<x-action-section>
    <x-slot name="title">
        {{ __('Esborrar compte') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Esborra permanentment el teu compte.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Un cop suprimit el vostre compte, se suprimiran permanentment tots els seus recursos i dades. Abans de suprimir el vostre compte, descarregueu qualsevol dada o informació que vulgueu conservar.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Esborrar compte') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Esborrar compte') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Esteu segur que voleu suprimir el vostre compte? Un cop suprimit el vostre compte, se suprimiran permanentment tots els seus recursos i dades. Introduïu la contrasenya per confirmar que voleu suprimir el vostre compte permanentment.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Contrasenya') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Esborrar compte') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
