<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        switch (Arr::get($exception->guards(),0)) {
            case 'admin':
                $route = 'admin.login.form';
                break;
            default:
                $route = 'login';
                break;
        }
        return redirect()->route($route);
    }
}
