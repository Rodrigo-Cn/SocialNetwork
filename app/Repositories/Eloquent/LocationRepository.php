<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Location;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface
{
    public function __construct(Location $location)
    {
        $this->model = $location;
    }
    
    public function findByPostId(int $postId)
    {
        return $this->model->where('post_id', $postId)->get();
    }
}
