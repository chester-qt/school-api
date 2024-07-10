<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function ok($code, $data = [], $message = '') : JsonResponse
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
