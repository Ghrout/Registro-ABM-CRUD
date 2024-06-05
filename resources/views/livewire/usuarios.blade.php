<div>
    <h1 class="text-center font-semibold text-gray-900 mb-8 leading-tight" style="font-size: 2.5rem;">Bienvenido al
        Dashboard de Usuarios</h1>

    <div class="mt-6" style="max-width: 1224px; margin: 0 auto; display: flex; justify-content: space-between;">
        <div style="width: 32%; max-width: 32%;" class="ml-4">
            <div class="bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold text-white mb-4 text-center">Registro de Usuario</h2>
                <form class="flex flex-wrap" wire:submit.prevent="save">
                    <input type="text" wire:model="user.nombre"
                        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] mr-[2%]"
                        placeholder="Nombre" />
                    @error('user.nombre')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="text" wire:model="user.apellido"
                        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] ml-[2%]"
                        placeholder="Apellido" />
                    @error('user.apellido')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="email" wire:model="user.correo"
                        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] mr-[2%]"
                        placeholder="Correo" />
                    @error('user.correo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="number" wire:model="user.telefono"
                        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] ml-[2%]"
                        placeholder="Teléfono" />
                    @error('user.telefono')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="password" wire:model="user.contrasena"
                        class="bg-gray-700 text-gray-200 border-0 rounded-md p-2 mb-4 focus:bg-gray-600 focus:outline-none focus:ring-1 focus:ring-blue-500 transition ease-in-out duration-150 w-full md:w-[48%] mr-[2%]"
                        placeholder="Contraseña" />
                    @error('user.contrasena')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <button type="submit"
                        style="background-color: #4a90e2; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; margin-top: 1rem; display: block; margin-left: auto; margin-right: auto;">
                        Submit
                    </button>
                    <input type="checkbox" id="hide-message">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <label for="hide-message" class="close-btn">OK</label>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div style="width: 65%; max-width: 65%;" class="mr-4">
            <div class="flex justify-center">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nombre</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Apellido</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Teléfono</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Email</th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->nombre }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->apellido }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->telefono }}</td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $user->correo }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                            <div style="display: flex; justify-content: space-between;">
                                                @livewire('edicion-usuario', ['id' => $user->id])

                                                <a wire:click="delete({{ $user->id }})">
                                                    <button type="submit"
                                                        style="background-color: #ff0000; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; margin-top: 0.3rem; margin-left: 2px">
                                                        Eliminar
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .alert {
            width: 50%;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .close-btn {
            display: inline-block;
            cursor: pointer;
            padding: 5px 10px;
            background-color: #337ab7;
            color: #fff;
            border-radius: 3px;
        }

        .close-btn:hover {
            background-color: #286090;
        }

        #hide-message {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        #hide-message:checked~.alert {
            display: none;
        }
    </style>
</div>
