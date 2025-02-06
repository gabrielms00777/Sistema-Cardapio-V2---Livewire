<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Session::all());
        if (!Session::has('table_id')) {
            return redirect()->route('site.index')->with('error', 'Leia o QRCode para acessar o sistema.');
        }

        if (now()->gt(Session::get('expires_at'))) {
            Session::forget(['table_id', 'expires_at']);
            return redirect()->route('site.index')->with('error', 'Sua sessão expirou. Leia o QRCode novamente.');
        }

        return $next($request);
    }
}
