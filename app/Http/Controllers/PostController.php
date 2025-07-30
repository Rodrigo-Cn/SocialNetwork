<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommunityCreateRequest;
use App\Http\Requests\PostCommunityUpdateRequest;
use App\Http\Requests\PostFeedCreateRequest;
use App\Http\Requests\PostFeedUpdateRequest;
use App\Services\PostService;
use App\Repositories\Contracts\LogRepositoryInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    protected PostService $postService;
    protected LogRepositoryInterface $logRepository;

    public function __construct(PostService $postService, LogRepositoryInterface $logRepository)
    {
        $this->postService = $postService;
        $this->logRepository = $logRepository;
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function storeFeedPost(PostFeedCreateRequest $request)
    {
        try {
            $params = $request->validated();
            $response = $this->postService->create($params);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'PostController@storeFeedPost',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }

    public function storeCommunityPost(PostCommunityCreateRequest $request)
    {
        try {
            $params = $request->validated();
            $response = $this->postService->create($params);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'PostController@storeCommunityPost',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }

    public function edit(string|int $id)
    {
        return $this->postService->getPost($params, $id);
    }

    public function updateFeedPost(PostFeedUpdateRequest $request, string|int $id)
    {
        try {
            $params = $request->validated();
            $response = $this->postService->edit($params, $id);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'PostController@updateFeedPost',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }

    public function updateCommunityPost(PostCommunityUpdateRequest $request, string|int $id)
    {
        try {
            $params = $request->validated();
            $response = $this->postService->edit($params, $id);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'PostController@updateCommunityPost',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'request' => $params,
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }

    public function destroy(string|int $id)
    {
        try {
            $response = $this->postService->delete($id);

            return response()->json([
                'success' => true,
                'data' => $response
            ], 201);
        } catch(\Throwable $throwable) {
            $this->logRepository->create([
                'reference' => 'PostController@updateCommunityPost',
                'data' => json_encode([
                    'error_message' => $throwable->getMessage(),
                    'file' => $throwable->getFile(),
                    'line' => $throwable->getLine(),
                    'headers' => request()->headers->all(),
                    'server' => request()->server(),
                    'ip' => request()->ip(),
                ]),
                'user_id' => $user->id ?? 4,
                'action_time' => Carbon::now()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Ocorreu um erro interno. Contate o suporte.'
            ], 500);
        }
    }
}
