<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function errorResponse($errors=null, $code=404) {
        return response()->json([
            'errors' => $errors,
            'data' => null,
            'status' => 'error'
        ], $code);
    }

    protected function successResponse($data=null, $code=200) {
        return response()->json([
            'errors' => null,
            'data' => $data,
            'status' => 'success'
        ], $code);
    }
}
