<?php

namespace App\Http\Livewire\Guest;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{

    protected $listeners = ['render'];

    /**
     * Render Livewire components
     *
     * @return void
     */
    public function render()
    {
        $categories = Category::all();
        return view('livewire.guest.navigation', compact('categories'));
    }
}
