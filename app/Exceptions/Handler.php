<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use \Illuminate\Http\Request ;
use \Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use \Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
    /**
     * Render an exception
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exeption
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @param \Sympony\Component\
     */
    public function render($request, Throwable $exception){
        if($exception instanceof AuthenticationException ){
            return response()->json([
                'res' => false,
                'error' => 'No Esta Autenticado'
            ],401);
        }
        if($exception instanceof HttpException ){
            return response()->json([
                'res' => false,
                'error' => 'Ruta no Encontrada'
            ],404);
        }
        if($exception instanceof QueryException ){
            return response()->json([
                'res' => false,
                'error' => 'Error en la Base de Datos'
            ],500);
        }
    }
}
