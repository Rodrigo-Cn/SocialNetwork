<?php

namespace App\Services;

use App\Models\Location;
use App\Repositories\Contracts\LocationRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService
{
    protected PostRepositoryInterface $postRepository;
    protected LocationRepositoryInterface $locationRepository;
    private Location $location;

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

            if(isset($params['video'])){
                $videoPath = $params['video']->storeAs('uploads/posts/videos', md5($user_id) . uniqid() . '.' . $params['video']->getClientOriginalExtension());
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

    public function edit(Array $params, int $id)
    {
        return DB::transaction(function() use ($params, $id){
            $imagePath = null;
            $videoPath = null;
            $user_id = Auth::id();
            $post = $this->postRepository->find($id);

            if(isset($params['image'])){
                if($post->image_url){
                    Storage::delete(Str::replaceFirst('/storage/','',$post->image_url));
                }
                $imagePath = $params['image']->storeAs('uploads/posts/images', md5($user_id) . uniqid() . '.' . $params['image']->getClientOriginalExtension());
            }else{
                $imagePath = $post->image_url;
            }

            if(isset($params['video'])){
                if($post->video_url){
                    Storage::delete(Str::replaceFirst('/storage/','',$post->video_url));
                }
                $videoPath = $params['video']->storeAs('uploads/posts/videos', md5($user_id) . uniqid() . '.' . $params['video']->getClientOriginalExtension());
            }else{
                $videoPath = $post->video_url;
            }

            $post = $this->postRepository->update(
                $post->id,
                [
                    'description' => $params['description'],
                    'image_url' => $imagePath,
                    'video_url' => $videoPath,
                    'status' => $params['status'],
                    'attached_url' => $params['attached_url'],
                    'highlight' => $params['highlight'],
                ]
            );

            $this->location = $this->locationRepository->findByPostId($post->id);
            if($this->location){
                $this->location = $this->locationRepository->update(
                    $this->location->id,
                    [
                        'country' => $params['location']['country'],
                        'state' => $params['location']['state'],
                    ]
                );
            }else{
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
