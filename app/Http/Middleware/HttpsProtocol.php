<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocol
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
          if (!$request->secure()) {
             // return redirect()->secure($request->getRequestUri());
			 return redirect()->to('https://bictsofttest.com/');
            }

            return $next($request); 
    }
    
}

// Now regiser the middleware inside karbel in Web group 
/*

   'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
           \App\Http\Middleware\HttpsProtocol::class,
        ],
		
		*/
