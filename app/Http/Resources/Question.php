<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\Resource;

class Question extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'priority' => $this->priority,
            'correctAnswer' => $this->correctAnswer,
            'create_at' => $this->create_at,
            'createDate' => $this->create_at->toIso8601String(),
            'author_id' => $this->author_id,
            'correctAnswer' => Answer::collection($this->correctAnswer),
            'answer' => Answer::collection($this->answers),
            'category' => Category::collection($this->category)
        ];
    }
}
