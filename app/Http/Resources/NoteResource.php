<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'category_name' => $this->category->name,
            'store' => $this->store,
            'summary' => $this->summary,
            'details' => $this->details,
            'solution' => $this->solution,
            'error' => $this->error_messages,
            'image' => $this->image_path
        ];
    }
}
