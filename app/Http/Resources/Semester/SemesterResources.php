<?php

namespace App\Http\Resources\Semester;

use Illuminate\Http\Resources\Json\JsonResource;

class SemesterResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $parent_array = parent::toArray($request);

        $return_array = [];
        return $return_array;
    }
}
