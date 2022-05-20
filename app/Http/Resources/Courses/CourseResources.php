<?php

namespace App\Http\Resources\Courses;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResources extends JsonResource
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
        $return_array['id'] = $parent_array['id'];
        $return_array['text'] = $parent_array['course_name'];

        return $return_array;
    }
}
