<?php

namespace App\Livewire\Site;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Illuminate\Support\Str;

#[Layout('layouts.site')]
class Cart extends Component
{
    #[On('post-order')]
    public function postOrder($items, $name, $total_price)
    {
        // dd($items, $name, $total_price);
        // $data = $this->validate([
        //     'name' => 'required',
        //     'items' => 'required|array',
        //     'total_price' => 'required|numeric',
        // ]);
        $order = Order::query()->create([
            // 'table_id' => Session::get('table_id'),
            'table_id' => 10,
            'name' => $name,
            'total_price' => $total_price,
        ]);

        $table = $order->table;

        if ($table->status == 'free') {
            $table->update([
                'status' => 'occupied',
                'session_id' => Str::ulid(),
            ]);
            // Table::query()->where('id', $data['table_id'])->update([
            //     'status' => 'occupied',
            //     'session_id' => Str::ulid(),
            // ]);
        }
        // info($table);

        $order->update([
            'session_id' => $table->session_id,
        ]);

        // info($order);

        foreach ($items as $item) {
            OrderItem::query()->create([
                'order_id' => $order->id,
                'menu_item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'observation' => $item['observation'],
            ]);
        }

        broadcast(new OrderCreated)->toOthers();
    }
    public function render()
    {
        return view('livewire.site.cart');
    }
}
