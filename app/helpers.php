<?php

use App\Models\Product;
use App\Models\Size;
use PhpParser\Node\Expr\FuncCall;

function quantity($product_id, $color_id = null, $size_id = null)
{
    $product = Product::find($product_id);

    if ($size_id) {
        $size = Size::find($size_id);
        $quantity =  $size->colors->find($color_id)->pivot->quantity;
    } elseif ($color_id) {
        $quantity =  $product->colors->find($color_id)->pivot->quantity;
    } else {
        $quantity = $product->quantity;
    }
    return $quantity;
}

function quantityAdded($product_id, $color_id = null, $size_id = null)
{
    $cart = \Cart::getContent();

    $item = $cart->where('id', $product_id)
        ->where('attributes.color', $color_id)
        ->where('attributes.size', $size_id)
        ->first();

    if ($item) {
        return $item->quantity;
    } else {
        return 0;
    }
}

function availableQuantity($product_id, $color_id = null, $size_id = null)
{
    return quantity($product_id, $color_id, $size_id) - quantityAdded($product_id, $color_id, $size_id);
}
