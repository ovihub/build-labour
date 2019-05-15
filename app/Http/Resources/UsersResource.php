<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Models\Users\WorkExperience;

class UsersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $profile_photo_url = ($this->profile_photo_url == null) ? '/img/defaults/user.png' : $this->profile_photo_url;
        
        // $experiences = WorkExperience::where([ 'user_id' => $this->id, 'isCurrent' => 1 ])->get();

        // $roles = '';
        // foreach ($experiences as $experience) {
        //     $roles .= $experience->job_role . ' / ';
        // }

        return [
            'full_name' => $profile_photo_url . ' ' . $this->first_name . ' ' . $this->last_name,
            'id'        => $this->id,
            'email'     => $this->email,
            'address'   => $this->address,
            // 'roles'     => rtrim($roles, ' / '),
        ];
    }
}
