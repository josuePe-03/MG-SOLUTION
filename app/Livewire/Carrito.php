<?php

namespace App\Livewire;

use Livewire\Component;

class Carrito extends Component
{
    public $carrito = [];

    public $mostrarCarrito = false;

    protected $listeners = [
        'productoAgregado' => 'agregarProducto',
        'toggleCarrito' => 'toggleCarrito',
        'obtenerTotalProductos'  => 'mandarTotalProductos'
    ];

    public function toggleCarrito()
    {
        $this->mostrarCarrito = !$this->mostrarCarrito;
    }

    public function mandarTotalProductos(){

        $totalCarrito = 0;

        foreach ($this->carrito as $item) {
            $totalCarrito += $item['cantidad'];
        }

        $this->dispatch('mandarTotalProductos',[
             $totalCarrito
        ]);
    }

    public function agregarProducto($producto)
    {
        $id = $producto['id'];

        if (!isset($this->carrito[$id])) {
            $this->carrito[$id] = [
                'nombre' => $producto['nombre'],
                'precio' => $producto['precio'],
                'cantidad' => 1,
            ];
        } else {
            $this->carrito[$id]['cantidad']++;
        }

        // abrir sidebar automáticamente al agregar
        $this->mostrarCarrito = true;
    }

    public function eliminarUnidad($id)
    {
        if (isset($this->carrito[$id])) {
            $this->carrito[$id]['cantidad']--;

            // Actualizar total de productos
            $this->mandarTotalProductos();

            if ($this->carrito[$id]['cantidad'] <= 0) {
                unset($this->carrito[$id]);
            }
        }
    }

    public function cotizar()
    {
        if (count($this->carrito) === 0) return;

        $mensaje = "Hola! Quiero cotizar los siguientes productos:\n";

        foreach ($this->carrito as $item) {
            $mensaje .= "- {$item['nombre']} x {$item['cantidad']} = $" . number_format($item['precio'] * $item['cantidad'], 2) . " MXN\n";
        }

        $total = collect($this->carrito)->sum(fn($i) => $i['precio'] * $i['cantidad']);
        $mensaje .= "Total: $" . number_format($total, 2) . " MXN";

        $numeroWhatsapp = '522841022581'; // tu número
        $url = "https://wa.me/{$numeroWhatsapp}?text=" . urlencode($mensaje);

        return redirect()->to($url);
    }

    public function render()
    {
        return view('livewire.carrito');
    }
}
