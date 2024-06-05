<div>
    <a wire:click="openModal({{ $user->id }})">
        <button type="button"
            style="background-color: #4a90e2; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; margin-top: 0.3rem;">
            Editar
        </button>
    </a>
    <!-- Modal -->

    <div class="mb-4" wire:loading wire:target="user">
        Cargando datos...
    </div>
    <x-dialog-modal wire:model="modal">
        <x-slot name="title" class="text-center">Edición de usuario</x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <label class="text-left text-gray-700 text-sm mb-2" for="nombre">Nombre</label>
                <input wire:model="nombre" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="mb-4">
                <label class="text-left text-gray-700 text-sm mb-2" for="apellido">Apellido</label>
                <input wire:model="apellido" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="mb-4">
                <label class="text-left text-gray-700 text-sm mb-2" for="telefono">Teléfono</label>
                <input wire:model="telefono" type="number"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="mb-4">
                <label class="text-left text-gray-700 text-sm mb-2" for="email">Email</label>
                <input wire:model="correo" type="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-button class="bg-blue-900" wire:click="save" style="margin-right: 2px;">Guardar</x-button>
            <x-button wire:click="closeModal" style="margin-right: 2px;">Cancelar</x-button>
        </x-slot>
    </x-dialog-modal>

</div>
