<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Hanya mengizinkan user dengan role 'admin' untuk melanjutkan request.
     * Jika user belum login, akan diarahkan ke halaman login.
     * Jika user login tapi bukan admin (misalnya petugas), akan menerima 403 Forbidden.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            return redirect('/login');
        }

        if ($request->user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
