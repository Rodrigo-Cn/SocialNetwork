<?php

namespace App\Services;

use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService
{
    protected PostRepositoryInterface $postRepository;
    protected LocationRepositoryInterface $locationRepository;
    private Array $location;

    public function __construct(PostRepositoryInterface $postRepository, LocationRepositoryInterface $locationRepository)
    {
        $this->postRepository = $postRepository;
        $this->locationRepository = $locationRepository;
        $this->location = [];
    }

    public function create(Array $params)
    {
        return DB::transaction(function() use ($params){
            $imagePath = null;
            $videoPath = null;
            $user_id = Auth::id();

            if(isset($params['image'])){
                $imagePath = $params['image']->storeAs('uploads/posts/images', md5($user_id) . uniqid() . '.' . $params['image']->getClientOriginalExtension());
            }

            $post = $this->postRepository->create([
                'description' => $params['description'],
                'image_url' => $imagePath,
                'video_url' => $videoPath,
                'status' => $params['status'],
                'attached_url' => $params['attached_url'],
                'highlight' => $params['highlight'],
                'user_id' => Auth::id()
            ]);

            if(isset($params['location'])){
                $this->location = $this->locationRepository->create([
                    'country' => $params['location']['country'],
                    'state' => $params['location']['state'],
                    'post_id' => $post->id
                ]);
            }

            return [
                'post' => $post,
                'location' => $this->location
            ];
        });
    }
}
