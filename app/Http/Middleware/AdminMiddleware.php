<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('auth/login');
            }
        } else {
            if ($request->user()->role->name != "Admin") {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    if ($request->user()->role->name == "Provider") {
                        return redirect()->route('provider');
                    } else {
                        if ($request->user()->role->name == "Worker") {
                            return redirect()->route('worker');
                        } else {
                                return redirect()->route('client');
                              }

                                    }

                                }
                            }
                        }
        return $next($request);
    }
}
