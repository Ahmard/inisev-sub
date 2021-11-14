<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\JsonResponseDecorator;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'name' => 'required|min:3|max:100',
            'password' => 'required|min:4|max:100',
        ]);

        if ($validator->fails()) {
            return JsonResponseDecorator::error($validator->errors());
        }

        $website = User::query()->create($validator->validated());

        return JsonResponseDecorator::success($website);
    }

}
