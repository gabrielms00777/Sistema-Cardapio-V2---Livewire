<?php

namespace App\Livewire\Site;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        DB::beginTransaction();

        try {
            $order = Order::query()->create([
                'table_id' => Session::get('table_id'),
                'name' => $name,
                'total_price' => $total_price,
            ]);

            $table = $order->table;

            if ($table->status == 'free') {
                $table->update([
                    'status' => 'occupied',
                    'session_id' => Str::ulid(),
                ]);
            }

            $order->update([
                'session_id' => $table->session_id,
            ]);

            foreach ($items as $item) {
                OrderItem::query()->create([
                    'order_id' => $order->id,
                    'menu_item_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'observation' => $item['observation'],
                ]);
            }

            DB::commit();

            broadcast(new OrderCreated)->toOthers();

            return;
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Erro ao criar pedido: ' . $e->getMessage());

            return;
        }
    }

    public function render()
    {
        return view('livewire.site.cart');
    }
}
