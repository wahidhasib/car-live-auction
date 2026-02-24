<?php

namespace App\Http\Middleware;

use Closure;
use Esign\ConversionsApi\Facades\ConversionsApi;
use Esign\ConversionsApi\Objects\DefaultUserData;
use Illuminate\Http\Request;

class InitializeFacebookUserData
{
    public function handle(Request $request, Closure $next)
    {
        ConversionsApi::setUserData(
            DefaultUserData::create()
                ->setEmail($request->user()?->email)
                ->setClientIpAddress($request->ip())
                ->setClientUserAgent($request->userAgent())
        );

        return $next($request);
    }
}
