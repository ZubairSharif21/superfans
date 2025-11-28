<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Throwable $exception)
    // {
    //     if ($exception instanceof AccessDeniedHttpException) {
    //         return response(view('errors.404'), 404);
    //     }
    //     return parent::render($request, $exception);
    // }

   	
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode()) 
                {
                // not found
                case 404:
                    return response(view('errors.404'), 404);
                break;

                // internal error
                case 419:
                    return response(view('errors.419'), 419);
                break;
                                // internal error
                case 403:
                    return response(view('errors.403'), 403);
                break;

                default:
                    return $this->renderHttpException($e);
                break;
            }
        }
        else
        {
                return parent::render($request, $exception);
        }
    }
 

}