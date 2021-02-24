<?php

namespace App\Traits\Utils;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    public function showAll(Collection $collection, $code = Response::HTTP_OK)
    {
        return $this->successResponse(['data' => $collection], $code);
    }

    public function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    public function showOne(Model $model, $code = Response::HTTP_OK)
    {
        return $this->successResponse(['data' => $model], $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function deleteResponse($message, $code = Response::HTTP_OK)
    {
        return response()->json(['message' => $message, 'code' => $code], $code);
    }
}
