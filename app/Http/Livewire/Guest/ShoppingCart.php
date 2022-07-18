<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class ShoppingCart extends Component
{
    protected $listeners = ['render'];

    /*  unable to call component public method addToCar */

    public function clearCart()
    {
        \Cart::clear();
        $this->emitTo('guest.cart', 'render');
        $this->emitTo('guest.navigation', 'render');
    }

    public function clearItem($itemId)
    {
        \Cart::remove($itemId);
        $this->emitTo('guest.cart', 'render');
        $this->emitTo('guest.navigation', 'render');
    }

    public function render()
    {
        return view('livewire.guest.shopping-cart')->layout('components.layouts.guest-layout');
    }
}
