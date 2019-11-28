<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class WorkerResource extends JsonResource
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

        $dt = Carbon::parse($this->created_at);
        $created_at = $dt->toFormattedDateString();
        $tempCompanies = $this->experiences;
        $company = NULL;

        if ($tempCompanies && count($tempCompanies) > 0) {

            if ($tempCompanies[0]->company_id) {

                $company= $tempCompanies[0]->company->name;

            } else {

                $company= $tempCompanies[0]->company_name;
            }
        }
        if($request->company_filter && $request->company_filter == $company && $request->company_filter != 'all'){
            return [
                'full_name' => $profile_photo_url . ' ' . $this->first_name . ' ' . $this->last_name,
                'id'        => $this->id,
                'company'   => $company,
                'role'      => $this->role,
                'email'     => $this->email,                        
                // 'address'   => $this->address,
                // 'sector'    => $this->sector,
                // 'tier'      => $this->tier,
                // 'willing_to_relocate' => $this->willing_to_relocate,
                'created_at' => $created_at
            ];
        }elseif(!$request->company_filter || $request->company_filter == 'all'){
            return [
                'full_name' => $profile_photo_url . ' ' . $this->first_name . ' ' . $this->last_name,
                'id'        => $this->id,
                'company'   => $company,
                'role'      => $this->role,
                'email'     => $this->email,                        
                // 'address'   => $this->address,
                // 'sector'    => $this->sector,
                // 'tier'      => $this->tier,
                // 'willing_to_relocate' => $this->willing_to_relocate,
                'created_at' => $created_at
            ];
        }
    }
}
