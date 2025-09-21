<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;

class ProductosList extends Component
{
    public $productos;
    public $productoParaCarrito;

    public function mount()
    {
        $this->productos = Producto::latest()->take(4)->get();
    }

    // Método para seleccionar un producto
    public function agregarAlCarrito($productoId)
    {
        $producto = Producto::find($productoId);

        if ($producto) {
            $this->dispatch('productoAgregado', [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
            ]);
            $this->dispatch('obtenerTotalProductos');
        }
    }

    public function render()
    {
        return view('livewire.productos-list');
    }
}
