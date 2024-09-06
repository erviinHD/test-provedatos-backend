<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'status' => $this->status,
            'email' => $this->email,
            'last_name' =>  $this->last_name,
            'dni' =>  $this->dni,
            'province' =>  $this->province,
            'date_birth' =>  $this->date_birth,
            'observation' =>  $this->observation,
            'date_start' => $this->date_start,
            'role' => $this->role,
            'department' => $this->department,
            'province_work' => $this->province_work,
            'salary' => $this->salary,
            'part_time' => filter_var($this->part_time, FILTER_VALIDATE_BOOLEAN),
            'observation_work' => $this->observation_work,
            'image' => $this->image ? url($this->image) : null,
        ];
    }
}
