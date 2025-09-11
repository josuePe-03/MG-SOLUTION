<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-white"></h2>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-50 border border-green-400 text-green-800 px-4 py-2 rounded-lg mb-4 shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @livewire('cliente-tabla')
</x-app-layout>
