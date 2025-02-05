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
        // if (!Session::has('table_id')) {
        //     return to_route('site.index');
        // }

        $this->categories = Category::query()->with('menuItems')->select('id', 'name')->get();
    }

    public function render()
    {
        return view('livewire.site.home');
    }
}
