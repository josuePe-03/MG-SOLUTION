<div>
    <div x-data>
        {{-- Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-md rounded-2xl p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-700">Productos</h3>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalProductos }}</p>
                </div>
                <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                    <i class="fas fa-boxes text-2xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>
