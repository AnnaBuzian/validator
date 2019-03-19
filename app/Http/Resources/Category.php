<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Controllers\Resources\Queue as QueueResource;

class Category extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'priority' => $this->priority,
            'created_at' => $this->created_at->toIso8601String(),
            'queues' => QueueResource::collection($this->queues),
        ];
    }
}
