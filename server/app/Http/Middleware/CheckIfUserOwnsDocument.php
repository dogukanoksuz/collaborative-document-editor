<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfUserOwnsDocument
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
        $id = $request->route('documentId');
        if ($id)
        {
            if (Auth::user()->document()->find($id) === null)
            {
                return redirect(route('dashboard'));
            }
        }
        return $next($request);
    }
}
