<?php

namespace Modules\CMS\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CmsManagementResource extends JsonResource
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
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'product_id' => $this->product_id,
            'image' => $this->image ? asset('storage/'.$this->image) : null,
            'magazine_logo' => $this->magazine_logo ? asset('storage/'.$this->magazine_logo) : null,
            'award_date' => $this->award_date,
            'award_section' => $this->award_section,
            'link' => $this->link,
            'created_at' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            'created_since' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
            'updated_since' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->diffForHumans() : null,
        ];
    }
}
