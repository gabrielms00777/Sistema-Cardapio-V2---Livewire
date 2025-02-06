<?php

namespace App\Livewire\Admin\Table;

use App\Models\Table;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Index extends Component
{
    #[Computed()]
    public function tables()
    {
        return Table::query()->get();
    }

    public function render()
    {
        return view('livewire.admin.table.index');
    }
}
