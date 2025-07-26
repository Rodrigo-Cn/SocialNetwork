<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFeedCreateRequest;
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
                'reference' => 'UserController@create',
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

    /**
     * Store a newly created resource in storage.
     */
    public function storeCommunityPost(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
