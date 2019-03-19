<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 08.11.2018
 * Time: 01:56
 */

namespace App\Http\Controllers\Resources;


use App\Http\Resources\Category;
use Illuminate\Http\Resources\Json\Resource;

class Queue extends Resource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'pathToFile' => $this->pathToFile,
            'startDateTime' => $this->startDateTime->toIso8601String(),
            'finishDateTime' => $this->startDateTime->toIso8601String(),
            'create_at' => $this->create_at->toIso8601String(),
            'isValid' => $this->isValid,
            'category' => new Category($this->category),
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
        ];
    }

}