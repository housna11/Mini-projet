<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $error) {
            //
        });
    }


    public function render($request, Throwable $error)
    {
    $status = 500; 
    if (method_exists($error, 'getStatusCode')) {
        $status = $error->getStatusCode();
    } else if ($error instanceof \Symfony\Component\HttpKernel\Exception\HttpExceptionInterface) {
        $status = $error->getStatusCode();
    }

    if (view()->exists("errors.$status")) {
        return response()->view("errors.$status", [], $status);
    }

    return parent::render($request, $error);
    }

}
