<?php

namespace App\Http\Livewire\Guest;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductEntry;
use App\Models\Size;
use Livewire\Component;
use Illuminate\Support\Str;


class ProductDetails extends Component
{
    public $product = null;

    public $colorList = [];
    public $sizeList = [];

    public $selectedSize = '';
    public $selectedColor = '';
    public $errorMessage = '';

    public $productEntries = [];

    public $maxQuantity = 0;
    public $qty = 1;



    public function mount(Product $product)
    {
        $this->product = $product;
        $this->productEntries = ProductEntry::where('product_id', $this->product->id)->get();
        $this->maxQuantity =  $this->productEntries->sum('quantity');
    }

    /**
     * Get product variants depending on color and size.
     *
     * @return void
     */
    public function getSizeAndColor()
    {
        /* $this->productEntries = ProductEntry::where('product_id', $this->product->id)->get(); */
        foreach ($this->productEntries as $variant) {
            if ($variant->size) {
                if (!in_array(['name' => $variant->size->name, 'id' => $variant->size_id], $this->sizeList)) {
                    array_push($this->sizeList, ['name' => $variant->size->name, 'id' => $variant->size_id]);
                }
            } else if ($variant->color) {
                if (!in_array(['name' => $variant->color->name, 'id' => $variant->color_id], $this->colorList)) {
                    array_push($this->colorList, ['name' => $variant->color->name, 'id' => $variant->color_id]);
                }
            } else {
                $this->maxQuantity = $this->productEntries->sum('quantity');
                break; //Because there can only be one element with the same characteristics
            }
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
    }

    /**
     * When the value of the selectedSize variable changes, we search if there is a variant that contains a color and whose current size matches those of the variant to obtain the colors.
     * 
     * @return void
     */
    public function updatedSelectedSize()
    {
        $this->colorList = [];
        $this->selectedColor = '';
        $this->maxQuantity = 0;
        $this->qty = 1;

        foreach ($this->productEntries as $variant) {
            if ($variant->color) {
                if ($variant->size_id == $this->selectedSize) {
                    if (!in_array(['name' => $variant->color->name, 'id' => $variant->color_id], $this->colorList)) {
                        array_push($this->colorList, ['name' => $variant->color->name, 'id' => $variant->color_id]);
                    }
                }
            }
        }
    }

    /**
     * When the value of the selectedColor variable changes, we search if the selected color matches the color of the variant to obtain its quantity.
     *
     * @return void
     */
    public function updatedSelectedColor()
    {
        $variantQty = 0;
        foreach ($this->productEntries as $variant) {

            if ($variant->size) {
                if ($variant->size_id == $this->selectedSize && $variant->color_id == $this->selectedColor) {
                    $variantQty = $variant->quantity;
                    break; //Because there can only be one element with the same characteristics
                }
            } else {
                if ($variant->color_id == $this->selectedColor) {
                    $this->colorList = [];
                    $variantQty = $variant->quantity;
                    break;  //Because there can only be one element with the same characteristics
                }
            }
        }

        $this->maxQuantity = $variantQty;
        $this->qty = 1;
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
        }
    }

    /**
     * Add item to cart 
     *
     * @return void
     */
    public function addToCart()
    {
        if ($this->selectedSize == '') {
            $this->errorMessage = 'Selecciona una talla';
        } else if ($this->selectedColor == '') {
            $this->errorMessage = 'Selecciona un color';
        } else {
            $this->errorMessage = '';
        }

        $this->validateData();
        if ($this->qty <= $this->maxQuantity || $this->qty > 0) {
            if (\Cart::getContent()->count() > 0) {
                //If the cart contains one or more items, update or create an item depending on its variants.
                if ($this->selectedSize != '') {
                    $this->colorSizeItem();
                } else if ($this->selectedColor != '') {
                    $this->colorItem();
                } else {
                    $this->basicItem();
                }
            } else {
                //If cart is empty then create a new item
                $this->createItem();
            }

            $this->emitTo('guest.cart', 'render');
            $this->emitTo('guest.navigation', 'render');
        }
    }

    /**
     * Creates or updates an element that has no color or size
     *
     * @return void
     */
    public function basicItem()
    {
        $exists = false;
        $productId = 0;

        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->product_id == $this->product->id) {
                $exists = true;
                $productId = $item->id;
                break;
            }
        }

        if ($exists) {
            $this->updateItem($productId);
        } else {
            $this->createItem();
        }
    }

    /**
     * Creates or updates a new product that has color
     *
     * @return void
     */
    public function colorItem()
    {
        $exists = false;
        $productId = 0;

        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->product_id == $this->product->id && $item->attributes->color_id == $this->selectedColor) {
                $exists = true;
                $productId = $item->id;
                break;
            }
        }

        if ($exists) {
            $this->updateItem($productId);
        } else {
            $this->createItem();
        }
    }

    /**
     * Creates or updates a new product that has color and size
     *
     * @return void
     */
    public function colorSizeItem()
    {
        $exists = false;
        $productId = 0;

        foreach (\Cart::getContent() as $item) {
            if ($item->attributes->product_id == $this->product->id && $item->attributes->color_id == $this->selectedColor && $item->attributes->size_id == $this->selectedSize) {
                $exists = true;
                $productId = $item->id;
                break;
            }
        }

        if ($exists) {
            $this->updateItem($productId);
        } else {
            $this->createItem();
        }
    }

    /**
     * Updates the item size
     *
     * @param [type] $id
     * @return void
     */
    public function updateItem($id)
    {
        \Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $this->qty
            ]
        ]);
    }

    /**
     * Creates an element
     *
     * @return void
     */
    public function createItem()
    {
        $id = Str::uuid()->toString();
        \Cart::add([
            'id' => $id,
            'name' =>  $this->product->name,
            'price' => $this->product->price,
            'quantity' => $this->qty,
            'attributes' => ['product_id' => $this->product->id, 'maxQuantity' => $this->maxQuantity, 'img' => '/storage/' . $this->product->img_1, 'color_id' => $this->selectedColor, 'size_id' => $this->selectedSize],
        ]);
    }

    /**
     * Validate data
     *
     * @return void
     */
    public function validateData()
    {
        if (count($this->sizeList) > 0) {
            $this->validate([
                'selectedSize' => 'required|not_in:0',
                'selectedColor' => 'required|not_in:0',
            ]);
        } else if (count($this->colorList) > 0) {
            $this->validate([
                'selectedColor' => 'required|not_in:0'
            ]);
        }
    }

    public function render()
    {
        $this->getSizeAndColor();
        return view('livewire.guest.product-details')->layout('components.layouts.guest-layout');
    }
}
