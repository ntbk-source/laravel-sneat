<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next, ...$roles)
	{
		if (!Auth::check()) {
			return abort(404);
		}

		$user = $request->user();

		foreach ($roles as $role) {
			if ($user->role === $role) {
				return $next($request);
			}
		}

		return abort(401);
	}
}
