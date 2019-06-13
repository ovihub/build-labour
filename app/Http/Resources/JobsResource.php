<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
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
            'id'            => $this->id,
            'title'         => $this->job_role_name,
            'description'   => $this->description,
            'about'         => $this->about,
            'exp_level'     => $this->exp_level,
            'contract_type' => $this->contract_type,
            'salary'        => $this->salary,
            'reports_to'    => $this->reports_to_str,
            'location'      => $this->location,
         //   'job_role_id'   => $this->job_role_id,
           // 'is_template'   => $this->is_template
        ];
    }
}
