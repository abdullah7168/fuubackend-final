<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'watch-for-requests',
        '/api/student/login',
        'api/degree-request',
        '/api/watch-for-reply',
        '/api/get-notification/',
        '/api/seen-notification'
    ];
}
