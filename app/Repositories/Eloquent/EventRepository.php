<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\EventRepositoryInterface;
use App\Models\Event;
use App\Repositories\Eloquent\BaseRepository;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{
    public function __construct(Event $event)
    {
        $this->model = $event;
    }
}
