<?php

namespace App\Livewire\Site;

use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.site')]
class Home extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::query()->with('menuItems')->select('id', 'name')->get();
    }

    public function render()
    {
        return view('livewire.site.home');
    }
}
