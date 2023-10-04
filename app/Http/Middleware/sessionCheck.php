<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class sessionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/CheckResSession.php

public function handle($request, Closure $next)
{
    if (!session('res')) {
        // Redirect the user to another page or route
        return redirect('402');
    }

    return $next($request);
}

}
