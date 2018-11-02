<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Poll extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => strtoupper($this->title),
            'created_at' => $this->created_at->toRssString(),
            'url' => '/api/polls/' . $this->id,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
