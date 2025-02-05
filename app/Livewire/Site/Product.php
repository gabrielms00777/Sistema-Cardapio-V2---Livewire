<?php

namespace App\Livewire\Site;

use App\Models\MenuItem;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.site')]
class Product extends Component
{
    public MenuItem $product;

    public function render()
    {
        return view('livewire.site.product');
    }
}
