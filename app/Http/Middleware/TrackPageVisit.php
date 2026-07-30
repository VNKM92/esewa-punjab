<?php

namespace App\Http\Middleware;

use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (
            $request->isMethod('GET')
            && ! $request->expectsJson()
            && ! $request->is('admin/*')
            && ! $request->is('verify/*')
            && ! $request->is('storage/*')
            && $response->isSuccessful()
        ) {
            $path = trim($request->path(), '/');
            $page = $path === '' ? '/' : '/'.$path;
            $sessionKey = 'tracked_page:'.$page.':'.now()->format('Y-m-d-H');

            if (! $request->session()->has($sessionKey)) {
                PageView::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => substr((string) $request->userAgent(), 0, 1000),
                    'page_url' => $page,
                ]);

                $request->session()->put($sessionKey, true);
            }
        }

        return $response;
    }
}
