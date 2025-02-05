<?php

namespace App\Livewire\Site;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.site')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.site.index');
    }
}
