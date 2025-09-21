<?php

namespace App\Livewire;

use Livewire\Component;

class BotonCarrito extends Component
{
    public $carritoTotal = 0;

    protected $listeners = [
        'mandarTotalProductos' => 'actulizarTotalCarrito',
    ];

    public function actulizarTotalCarrito($totalCarrito)
    {
        $this->carritoTotal = $totalCarrito[0];
    }

    public function abrirCarrito()
    {
        $this->dispatch('toggleCarrito');
    }

    public function render()
    {
        return view('livewire.boton-carrito');
    }
}
