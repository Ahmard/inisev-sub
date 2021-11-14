<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\JsonResponseDecorator;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class WebsiteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function createWebsite(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|int|exists:users,id',
            'website_name' => 'required|min:3|max:500',
            'website_domain' => 'required|min:4|max:63',
        ]);

        if ($validator->fails()) {
            return JsonResponseDecorator::error($validator->errors());
        }

        $website = Website::query()->create($validator->validated());

        return JsonResponseDecorator::success($website);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function subscribe(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|int|exists:users,id',
            'website' => 'required|int|exists:websites,website_id',
        ]);

        if ($validator->fails()) {
            return JsonResponseDecorator::error($validator->errors());
        }

        $subscription = Subscription::query()->create($validator->validated());

        return JsonResponseDecorator::success($subscription);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function createPost(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user' => 'required|int|exists:users,id',
            'post_title' => 'required|min:3|max:500',
            'post_content' => 'required|min:3|max:10000',
        ]);

        if ($validator->fails()) {
            return JsonResponseDecorator::error($validator->errors());
        }

        $post = Post::query()->create($validator->validated());

        return JsonResponseDecorator::success($post);
    }
}
