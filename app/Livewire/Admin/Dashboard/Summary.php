<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Order;
use App\Models\Table;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Summary extends Component
{
    public $totalTables;

    public $pendingOrders;

    public $totalRevenueToday;

    public function mount()
    {
        $this->loadData();
    }

    public function placeholder()
    {
        return view('placeholders.admin.dashboard.summary');
    }

    public function loadData()
    {
        $this->totalTables = Table::count();
        $this->pendingOrders = Order::where('status', 'pending')->count();
        $this->totalRevenueToday = Order::whereDate('created_at', Carbon::today())
            ->where('status', 'paid')
            ->sum('total');
    }

    public function render()
    {
        return view('livewire.admin.dashboard.summary');
    }
}
