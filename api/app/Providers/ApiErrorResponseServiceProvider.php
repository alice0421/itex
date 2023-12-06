<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ApiErrorResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * 
     * @return void
     */
    public function boot(): void
    {
        // NOTE: response()->error($code, $message, $detail); で使用可能
        Response::macro('error', function (int $code, string $message, array | string $detail = null) {
            if (is_null($detail)) {
                return response()->json([
                    'error' => [
                        'code' => $code,
                        'message' => $message,
                    ]
                ], $code);
            }

            return response()->json([
                'error' => [
                    'code' => $code,
                    'message' => $message,
                    'detail' => $detail,
                ]
            ], $code);
        });
    }
}
