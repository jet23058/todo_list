<?php

namespace App\Http\Resources\Todo;

use App\Services\TodoService;
use Illuminate\Http\Resources\Json\Resource;

class ShowResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'attachment' => $this->attachment,
            'created_at' => dateFormat($this->created_at),
            'done_at' => TodoService::transDoneAt($this->done_at),
            'status' => TodoService::transStatus($this->done_at),
        ];
    }
}
