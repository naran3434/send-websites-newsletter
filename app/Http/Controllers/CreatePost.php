<?php

namespace App\Http\Controllers;

use App\Events\PrepareMailingList;
use App\Models\Post;
use App\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator as ValidationContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreatePost extends Controller
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

        $input = $validation->validated();
        $post = Post::create($input);

        event(new PrepareMailingList($post));

        return $this->jsonResponse($post, true, 'Post created successfully!');
    }

    /**
     * @param array $data
     * @return ValidationContract
     */
    protected function validator(array $data): ValidationContract {
        return Validator::make($data, [
                'title'      => 'required',
                'body'       => 'required',
                'web_master_id' => 'required|numeric|exists:web_masters,id'
            ]
        );
    }
}
