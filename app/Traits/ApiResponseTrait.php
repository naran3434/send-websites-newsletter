<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{

    /**
     * @var bool
     */
    protected $status = false;

    /**
     * @var int
     */
    protected $http = 200;


    /**
     * @param $validator
     * @return JsonResponse
     */
    protected function throwResponse($validator): JsonResponse {
        return response()->json(array(
            'success'    => false,
            'data'      => $validator->getMessageBag(),
            'info'      => 'validation_error'
        ), 422);
    }

    /**
     * @param $data
     * @param bool $status
     * @param string $info
     * @param int $httpStatus
     * @return JsonResponse
     */
    protected function jsonResponse($data, bool $status = true, string $info = '', int $httpStatus = 200): JsonResponse {
        return response()->json([
            'success'   => $status,
            'data'      => $data,
            'info'      => $info,
        ], $httpStatus);
    }

}
