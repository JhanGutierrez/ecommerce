<?php

namespace App\Http\Livewire\Guest;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ProductList extends Component
{
    public $category = null;
    public $subcategory = null;

    public $selectedBrands = [];
    public $selectedSizes = [];
    public $selectedColors = [];

    public function mount($subcategory = null, Category $category = null)
    {
        $this->category = $category;
        $this->subcategory = $subcategory;
    }

    public function render()
    {
        //TODO: Orden alfabético

        //Filter by subcategories
        $subcategories = $this->category->subcategories;

        //Filter by brands
        $brands = Brand::select('brands.*')
            ->join('products', 'products.brand_id', '=', 'brands.id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->where([
                'subcategories.category_id' => $this->category->id,
                'products.status' => 2
            ]);

        //Filter by sizes
        $sizes = Size::select('sizes.*')
            ->join('product_entries', 'product_entries.size_id', '=', 'sizes.id')
            ->join('products', 'products.id', '=', 'product_entries.product_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->where([
                'subcategories.category_id' => $this->category->id,
                'products.status' => 2
            ]);

        //Filter by color
        $colors = Color::select('colors.*')
            ->join('product_entries', 'product_entries.color_id', '=', 'colors.id')
            ->join('products', 'products.id', '=', 'product_entries.product_id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->where([
                'subcategories.category_id' => $this->category->id,
                'products.status' => 2
            ]);

        $products = Product::query();
        $products = $products->select('products.*')
            ->join('product_entries', 'product_entries.product_id', '=', 'products.id')
            ->join('subcategories', 'subcategories.id', '=', 'products.subcategory_id')
            ->where([
                'subcategories.category_id' => $this->category->id,
                'products.status' => 2
            ]);

        if ($this->subcategory != null) {
            $brands->where('subcategories.id', $this->subcategory);
            $sizes->where('subcategories.id', $this->subcategory);
            $colors->where('subcategories.id', $this->subcategory);
            $products->where('products.subcategory_id', $this->subcategory);
        }

        if (count($this->selectedSizes) > 0) {
            $products->whereIn('product_entries.size_id', $this->selectedSizes);
        }

        if (count($this->selectedColors) > 0) {
            /* dd($this->selectedColors); */
            $products->whereIn('product_entries.color_id', $this->selectedColors);
        }

        if (count($this->selectedBrands) > 0) {
            $products->whereIn('brand_id', $this->selectedBrands);
        }

        $colors = $colors->distinct()->get();
        $sizes = $sizes->distinct()->get();
        $brands = $brands->distinct()->get();
        $products = $products->take(12)->distinct()->get();

        //TODO:FILTER

        return view('livewire.guest.product-list', compact(
            'products',
            'subcategories',
            'brands',
            'sizes',
            'colors'
        ))->layout('components.layouts.guest-layout');
    }
}
