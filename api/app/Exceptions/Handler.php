<?php
declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
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
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request $request // WARNING: 型を付けるとオーバーライドが失敗するため、型はつけないように
     * @param  \Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse
     */
    // NOTE: "401 Unauthenticated." をオーバーライド（throw AuthenticationExceptionで以下のjsonレスポンスを返す）
    protected function unauthenticated($request, AuthenticationException $exception): JsonResponse
    {
        return response()->error(
            Response::HTTP_UNAUTHORIZED,
            '401 Unauthenticated.',
            $exception->getMessage(),
        );
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        // NOTE: "404 Not Found." を変更（throw NotFoundHttpExceptionで以下のjsonレスポンスを返す）
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            return response()->error(
                Response::HTTP_NOT_FOUND,
                '404 Not Found.',
                $e->getMessage(),
            );
        });
    }
}
