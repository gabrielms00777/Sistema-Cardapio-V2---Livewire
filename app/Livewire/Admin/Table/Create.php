<?php

namespace App\Livewire\Admin\Table;

use App\Models\Table;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public ?string $number = null;

    public function save()
    {
        $this->validate();

        $table = Table::create([
            'number' => $this->number,
            'token' => Str::uuid(),
        ]);

        $url = route('site.token', ['token' => $table->token]);

        $qrcode = QrCode::size(200)->generate($url);

        $table->update([
            'qrcode' => $qrcode
        ]);

        return $this->redirect(route('admin.table.index'), true);
    }

    public function render()
    {
        return view('livewire.admin.table.create');
    }
}
