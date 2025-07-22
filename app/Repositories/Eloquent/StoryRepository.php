<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\StoryRepositoryInterface;
use App\Models\Story;

class StoryRepository extends BaseRepository implements StoryRepositoryInterface
{
    public function __construct(Story $story)
    {
        $this->model = $story;
    }
}
