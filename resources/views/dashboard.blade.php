<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-100">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Cards de estadísticas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-white shadow-md rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Clientes</h3>
                        <p class="text-3xl font-bold text-blue-600">120</p>
                    </div>
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-full">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Doctores</h3>
                        <p class="text-3xl font-bold text-green-600">35</p>
                    </div>
                    <div class="bg-green-100 text-green-600 p-3 rounded-full">
                        <i class="fas fa-user-md text-2xl"></i>
                    </div>
                </div>

                <div class="bg-white shadow-md rounded-2xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Análisis</h3>
                        <p class="text-3xl font-bold text-purple-600">450</p>
                    </div>
                    <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                        <i class="fas fa-vials text-2xl"></i>
                    </div>
                </div>
            </div>

            {{-- Gráficas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                
                <div class="bg-white shadow-md rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Clientes por Mes</h3>
                    <canvas id="clientesChart"></canvas>
                </div>

                <div class="bg-white shadow-md rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Análisis por Categoría</h3>
                    <canvas id="analisisChart"></canvas>
                </div>

            </div>

        </div>
    </div>

    {{-- Font Awesome & Chart.js --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Gráfica de clientes por mes
        const ctx1 = document.getElementById('clientesChart');
        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Clientes',
                    data: [10, 25, 40, 60, 80, 120],
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37, 99, 235, 0.3)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });

        // Gráfica de análisis por categoría
        const ctx2 = document.getElementById('analisisChart');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Sangre', 'Orina', 'Rayos X', 'Otros'],
                datasets: [{
                    label: 'Análisis',
                    data: [150, 100, 120, 80],
                    backgroundColor: [
                        '#8b5cf6',
                        '#10b981',
                        '#f59e0b',
                        '#ef4444'
                    ]
                }]
            }
        });
    </script>
</x-app-layout>
