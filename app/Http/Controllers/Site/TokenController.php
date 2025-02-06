<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function __invoke(Request $request)
    {
        $table = Table::query()->where('token', $request->token)->firstOrFail(['id']);

        session([
            'table_id' => $table->id,
            'expires_at' => now()->addMinutes(5),
        ]);

        return to_route('site.home');
    }
}
