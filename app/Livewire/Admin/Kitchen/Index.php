<?php

namespace App\Livewire\Admin\Kitchen;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public function updateItemStatus(int $itemId, string $status)
    {
        // dd($itemId, $status);
        $item = OrderItem::findOrFail($itemId);
        $item->update(['status' => $status]);

        if ($status == 'ready') {
            $order = $item->order;
            if ($order->items->every(fn($item) => $item->status == 'ready')) {
                $order->update(['status' => 'ready']);
                $this->orders();
            }
        }
    }

    #[On('echo:orders,OrderCreated')]
    public function orderCreatedEvent()
    {
        $this->orders();
    }

    #[Computed()]
    public function orders()
    {
        return Order::query()
            // ->withAggregate('table', 'number', 'table_number')
            ->whereDate('created_at', '=', Carbon::today()->toDateString())
            ->where('status', '<>', 'ready')
            ->where('status', '<>', 'paid')
            ->with(['items.menuItem', 'table'])
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.kitchen.index');
    }
}
