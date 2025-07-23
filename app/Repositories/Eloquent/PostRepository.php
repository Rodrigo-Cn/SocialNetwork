<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $post)
    {
        $this->model = $post;
    }
}
