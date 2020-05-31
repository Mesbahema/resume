<?php

namespace App\Http\Resources\Profile;

use App\Resume;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ResumeResource
 *
 * @mixin Resume
 *
 * @package App\Http\Resources\Profile
 */
class ResumeResource extends JsonResource
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
            'id'  => $this->id,
            'job' => $this->job->title
        ];
    }
}
