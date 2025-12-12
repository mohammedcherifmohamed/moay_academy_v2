<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Licence;
use App\Http\Controllers\has_licence as LicenceController;

class Has_licence
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $has_licence = LicenceController::checkLicence();
        if (!$has_licence) {
            abort(403, 'Licence not found or invalid Contact Developer.');
        }
        return $next($request);
    }
}
