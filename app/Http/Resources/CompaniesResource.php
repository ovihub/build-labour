<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompaniesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'photo_url' => $this->photo_url,
            'no_of_workers' => $this->no_of_workers
        ];
    }
}
