<?php

namespace App\Http\Middleware;

use App\Models\SiteVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TrackSiteVisit
{
    /**
     * Track unique site visitors by IP, with a 3-hour cooldown.
     * Same IP within 3 hours = do not count again.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip admin and API routes — only track public-facing pages
        if (!$request->is('admin/*') && !$request->is('api/*')) {
            $ip = $request->ip();
            $cooldown = now()->subHours(3);

            $recentVisit = SiteVisit::where('ip_address', $ip)
                ->where('visited_at', '>=', $cooldown)
                ->exists();

            if (!$recentVisit) {
                SiteVisit::create([
                    'ip_address' => $ip,
                    'visited_at' => now(),
                ]);
            }
        }

        return $next($request);
    }
}
