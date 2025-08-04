@props(['nombre', 'descripcion', 'img'])

<div class="bg-white rounded-lg shadow hover:shadow-lg transition">
    <img src="/assets/images/{{ $img }}" alt="{{ $nombre }}" class="w-full h-48 object-cover rounded-t-lg">
    <div class="p-4">
        <h3 class="text-lg font-semibold">{{ $nombre }}</h3>
        <p class="text-sm mt-2">{{ $descripcion }}</p>
    </div>
</div>
