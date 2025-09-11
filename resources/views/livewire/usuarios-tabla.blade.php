<div>
    <section class="">
        <div class="">
            <!-- Start coding here -->
            <div class="bg-whiterelative shadow-lg sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text"
                                    wire:model.live="search"  name="search" placeholder="Buscar usuarios..." 
                                    id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a 
                        href="{{ route('usuarios.create') }}"
                        type="button" class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Nuevo Usuario
                        </a>
                    </div>
                </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-800 uppercase bg-gray-200 ">
                        <tr>
                            <th scope="col" class="px-4 py-3">#</th>
                            <th scope="col" class="px-4 py-3">Nombre</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Acciones</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($usuarios as $usuario)
                        <tr class="border-b ">
                            <td class="px-4 py-3">{{ $usuario->id }}</td>
                            <td class="px-4 py-3">{{ $usuario->name }}</td>
                            <td class="px-4 py-3">{{ $usuario->email }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ route('usuarios.edit', $usuario) }}" 
                                class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium hover:bg-blue-200 transition">
                                    Editar
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium hover:bg-red-200 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-3 text-center text-gray-500">
                                No se encontraron usuarios.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- PAGINACION --}}
                <div class="p-4">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
    </section>
</div>