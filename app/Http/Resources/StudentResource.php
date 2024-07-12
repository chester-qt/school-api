<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'student',
            'attribute' => [
                'id' => $this->id,
                'department_id' => $this->department_id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'date_of_birth' => $this->date_of_birth,
                'enrolled' => $this->enrolled,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ],
            'teachers' => TeacherResource::collection($this->whenLoaded('teachers')),
        ];
    }
}
