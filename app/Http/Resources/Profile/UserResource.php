<?php

namespace App\Http\Resources\Profile;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 *
 * @mixin User
 *
 * @package App\Http\Resources\Profile
 */
class UserResource extends JsonResource
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
            'profile' => [
                'first_name' => $this->first_name,
                'last_name'  => $this->last_name,
                'user_name'  => $this->user_name,
                'email'      => $this->email,
            ],
            'job' => ResumeResource::collection($this->resumes)
        ];
    }
}
