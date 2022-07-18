<?php

namespace App\Http\Livewire\Guest;

use App\Models\Product;
use Livewire\Component;

class UpdateCartItem extends Component
{
    public $itemId;
    public $qty;
    public $maxQuantity;

    public function mount()
    {
        $item = \Cart::get($this->itemId);
        $this->qty = $item->quantity;
        $this->maxQuantity =  $item->attributes->maxQuantity;
    }

    /**
     * Allows us to add a number of products
     *
     * @return void
     */
    public function addQty()
    {
        if ($this->qty < $this->maxQuantity) {
            $this->qty++;
            $this->updateItem();
        }
    }

    /**
     * Allows us to add a number of products
     *
     * @return void
     */
    public function removeQty()
    {
        if ($this->qty > 1) {
            $this->qty--;
            $this->updateItem();
        }
    }

    /**
     * Updates the amount entered in the input
     *
     * @return void
     */
    public function updatedQty()
    {
        if ($this->qty <= 0 || $this->qty > $this->maxQuantity) {
            $this->qty = 1;
        }

        $this->updateItem();
    }

    /**
     * Updates the item size
     *
     * @param [type] $id
     * @return void
     */
    public function updateItem()
    {
        \Cart::update($this->itemId, [
            'quantity' => [
                'relative' => false,
                'value' => $this->qty
            ]
        ]);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.guest.update-cart-item');
    }
}
