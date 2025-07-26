<?php

namespace App\Services;

use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PostService
{
    protected PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function create(Array $params)
    {
        return DB::transaction(function() use ($params){
            $this->postRepository->create(
                $params
            );
        });
    }
}
