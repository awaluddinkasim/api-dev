<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;

abstract class Controller
{
    /**
     * Mengembalikan response JSON dengan status success
     *
     * @param  array|object  $data  response data
     * @param  string  $message  response message
     * @param  int  $code  response code (default: 200)
     */
    public function successResponse(array|object $data, string $message, int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => $data,
            'message' => $message,
            'timestamp' => now(),
        ], $code);
    }

    /**
     * Mengembalikan response JSON dengan status error
     *
     * @param  string  $message  response message
     * @param  int  $code  response code (default: 400)
     */
    public function errorResponse(string $message, int $code): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'timestamp' => now(),
        ], $code);
    }

    /**
     * Mengembalikan response JSON dengan status error
     * untuk error validasi
     *
     * @param  string  $message  response message
     * @param  MessageBag  $errors  validation errors
     */
    public function validationErrorResponse(string $message, MessageBag $errors): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors,
            'timestamp' => now(),
        ], 422);
    }
}
