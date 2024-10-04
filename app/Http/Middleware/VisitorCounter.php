<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil data pengunjung
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        // Cek apakah pengunjung sudah pernah tercatat (misalnya menggunakan IP dan User-Agent)
        $visitor = \App\Models\Visitor::where('ip_address', $ip)
            ->where('user_agent', $userAgent)
            ->first();

        if (!$visitor) {
            // Jika belum, simpan data pengunjung
            \App\Models\Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
            ]);
        }

        return $next($request);
    }
}
