@extends('layouts.main')

@section('title', 'Inicio | Refacciones Móviles')

@section('content')

  {{-- Hero --}}
  <section class="bg-cover bg-center h-[28rem] flex items-center justify-center text-white relative mt-16"
    style="background-image: url('/assets/images/refacciones-banner.jpg');">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-blue-800/80"></div>
    <div class="relative z-10 text-center p-6 max-w-2xl" 
         x-data="{ show: false }" 
         x-init="setTimeout(() => show = true, 300)">
      <h1 x-show="show" 
          x-transition:enter="transition ease-out duration-700 transform"
          x-transition:enter-start="opacity-0 translate-y-10"
          x-transition:enter-end="opacity-100 translate-y-0"
          class="text-4xl md:text-5xl font-bold tracking-wide">
          Refacciones de Calidad para tu Celular
      </h1>
      <p x-show="show" 
         x-transition:enter="transition ease-out duration-700 transform delay-300"
         x-transition:enter-start="opacity-0 translate-y-6"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="mt-4 text-lg md:text-xl text-blue-100">
         Encuentra pantallas, baterías y accesorios para todas las marcas con <strong>Refacciones Móviles</strong>.
      </p>
      <a href="#productos" x-show="show"
         x-transition:enter="transition ease-out duration-700 transform delay-600"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         class="mt-6 inline-block bg-blue-500 hover:bg-blue-600 transition px-8 py-3 rounded-full font-semibold shadow-lg">
         Ver productos
      </a>
    </div>
  </section>

  {{-- Servicios --}}
  <section id="servicios" class="py-16 bg-gray-50">
    <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">¿Por qué elegirnos?</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-6">
      @foreach ([
        ['nombre' => 'Calidad Garantizada', 'descripcion' => 'Refacciones originales y genéricas de la mejor calidad.', 'icon' => '🔧'],
        ['nombre' => 'Precios Competitivos', 'descripcion' => 'Los mejores precios del mercado para mayoristas y minoristas.', 'icon' => '💲'],
        ['nombre' => 'Atención Rápida', 'descripcion' => 'Soporte y envíos rápidos a todo el país.', 'icon' => '⚡'],
      ] as $servicio)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col p-6 text-center hover:shadow-2xl transition">
          <div class="text-5xl mb-3">{{ $servicio['icon'] }}</div>
          <h3 class="text-xl font-semibold text-indigo-700 mb-2">{{ $servicio['nombre'] }}</h3>
          <p class="text-gray-600 flex-1">{{ $servicio['descripcion'] }}</p>
        </div>
      @endforeach
    </div>
  </section>

  {{-- Listado de productos --}}
  <section id="productos" class="py-16">
      <div class="max-w-7xl mx-auto px-6">
          <h2 class="text-3xl font-bold text-gray-800 mb-10">Nuestros Productos</h2>
          @livewire('productos-list')
      </div>
  </section>


  {{-- Nosotros --}}
  <section id="nosotros" class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
      <div>
        <h2 class="text-3xl font-bold text-indigo-700 mb-4">Sobre Nosotros</h2>
        <p class="text-gray-700 mb-4">En <strong>Refacciones Móviles</strong> tenemos más de 2 años en el mercado ofreciendo productos de calidad para la reparación de dispositivos móviles. Nuestro objetivo es ser el aliado de técnicos, negocios y clientes finales.</p>
        <p class="text-gray-700">Contamos con un amplio catálogo de refacciones y accesorios, siempre con garantía y al mejor precio.</p>
      </div>
      <div>
        <img src="/assets/images/tienda-refacciones.jpg" alt="Tienda de refacciones" class="rounded-xl shadow-lg">
      </div>
    </div>
  </section>

  {{-- CTA + Formulario de contacto --}}
  <section id="contacto" class="py-16 bg-gradient-to-r from-blue-700 to-indigo-800 text-white text-center px-4">
    <h2 class="text-3xl font-bold mb-4">¿Buscas una refacción?</h2>
    <p class="mb-6 text-lg text-blue-100">Contáctanos y recibe atención personalizada de <strong>Refacciones Móviles</strong></p>

    <div x-data="{ nombre: '', email: '', mensaje: '', enviado: false }" class="max-w-xl mx-auto text-left bg-white text-gray-800 p-8 rounded-xl shadow-lg">
      <form x-show="!enviado" @submit.prevent="enviado = true">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Nombre</label>
          <input type="text" x-model="nombre" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
          <input type="email" x-model="email" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Mensaje</label>
          <textarea x-model="mensaje" rows="4" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium">Enviar</button>
      </form>

      <div x-show="enviado" x-transition class="text-center py-8">
        <h3 class="text-xl font-semibold text-green-600">✅ ¡Mensaje enviado!</h3>
        <p class="text-gray-700 mt-2">Nos pondremos en contacto contigo lo antes posible.</p>
      </div>
    </div>
  </section>

@endsection
