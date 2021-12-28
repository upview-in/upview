<?php

namespace App\Http\Middleware;

use App\Helper\YoutubeHelper;
use Closure;
use Illuminate\Http\Request;

class YtTokenCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $acc = (new YoutubeHelper())->withAuth();
        if (!is_null($acc)) {
            $uri = $acc->getTargetUrl();
            if (!empty($uri)) {
                return redirect()->away($uri);
            }
        }

        return $next($request);
    }
}
