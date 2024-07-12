<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'teacher',
            'attributes' => [
                'id' => $this->id,
                'department_id' => $this->department_id,
                'name' => $this->name
            ],
            'students' => StudentResource::collection($this->whenLoaded('students')),

        ];
    }
}
