<?php

namespace Modules\Settings\Http\Resources\Branches;

use Illuminate\Http\Resources\Json\JsonResource
;

class BranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'branch' => $this->branch,
            'branch_ar' => $this->branch_ar,
            'address_en' => $this->address_en,
            'address_ar' => $this->address_ar,
            'how_to_reach_en' => $this->how_to_reach_en,
            'how_to_reach_ar' => $this->how_to_reach_ar,
            'phone' => $this->phone,
            'email' => $this->email,
            'map' => $this->map,
            'created_at' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            'created_since' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
            'updated_since' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
        ];
    }
}
