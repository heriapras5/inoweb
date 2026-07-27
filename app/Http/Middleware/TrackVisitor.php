<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin*') || $request->isMethod('POST')) {
            return $next($request);
        }

        $agent = $request->userAgent();
        $deviceType = 'desktop';
        if (preg_match('/(android|iphone|ipad|mobile)/i', $agent ?? '')) {
            $deviceType = preg_match('/(ipad|tablet)/i', $agent ?? '') ? 'tablet' : 'mobile';
        }

        PageView::create([
            'ip_address' => $request->ip(),
            'user_agent' => $agent,
            'page_url' => $request->fullUrl(),
            'device_type' => $deviceType,
        ]);

        return $next($request);
    }
}
