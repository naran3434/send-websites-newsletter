<?php

namespace App\Http\Controllers;

use App\Models\UserSubscription;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator as ValidationContract;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Subscribe extends Controller
{
    use ApiResponseTrait;

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function __invoke(Request $request): JsonResponse
    {
        $validation = $this->validator($request->all());
        if($validation->fails()){
            return $this->throwResponse($validation);
        }

        try {
            $input = $validation->validated();
            $subscribed = UserSubscription::create($input);
            return $this->jsonResponse($subscribed, true, 'Subscribed successfully!');
        } catch (QueryException $e) {
            return $this->jsonResponse(null, false, 'Already Subscribed!');
        }
    }

    /**
     * @param array $data
     * @return ValidationContract
     */
    protected function validator(array $data): ValidationContract {
        return Validator::make($data, [
                'user_id'       => 'required|numeric|exists:users,id',
                'web_master_id' => 'required|numeric|exists:web_masters,id'
            ]
        );
    }
}
