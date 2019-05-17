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
            'company_id'    => $this->company_id,
            'title'         => $this->title,
            'description'   => $this->description,
            'about'         => $this->about,
            'exp_level'     => $this->exp_level,
            'contract_type' => $this->contract_type,
            'salary'        => $this->salary,
            'reports_to'    => $this->reports_to,
            'location'      => $this->location,
        ];
    }
}
