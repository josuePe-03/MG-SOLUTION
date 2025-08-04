@extends('layouts.main')

@section('title', 'Inicio | LabQuimic')

@section('content')
  {{-- Hero --}}
  <section class="bg-cover bg-center h-96 flex items-center justify-center text-white mb-12" style="background-image: url('/assets/images/lab-banner.jpg');">
    <div class="text-center bg-black/50 p-6 rounded">
      <h2 class="text-4xl font-bold">Análisis Químicos Profesionales</h2>
      <p class="mt-2 text-lg">Confía en nuestro laboratorio certificado para resultados precisos</p>
      <a href="#servicios" class="mt-4 inline-block bg-indigo-600 hover:bg-indigo-700 px-6 py-2 rounded">Ver servicios</a>
    </div>
  </section>

  {{-- Servicios --}}
  <section id="servicios">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Nuestros Servicios</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @foreach ([
        ['nombre' => 'Análisis Clínico', 'descripcion' => 'Pruebas de laboratorio para diagnóstico médico.', 'img' => 'analisis-clinico.jpg'],
        ['nombre' => 'Análisis de Agua', 'descripcion' => 'Evaluación de potabilidad y contaminación.', 'img' => 'analisis-agua.jpg'],
        ['nombre' => 'Análisis de Alimentos', 'descripcion' => 'Control de calidad microbiológico y químico.', 'img' => 'analisis-alimentos.jpg'],
      ] as $servicio)
        <x-service-card 
          :nombre="$servicio['nombre']" 
          :descripcion="$servicio['descripcion']" 
          :img="$servicio['img']" />
      @endforeach
    </div>
  </section>
@endsection
