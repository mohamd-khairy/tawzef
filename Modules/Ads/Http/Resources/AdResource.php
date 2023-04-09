<?php

namespace Modules\Ads\Http\Resources;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'id' => $this->id,
            'title' => app()->getLocale() == 'en' ? $this->title : $this->title_ar,
            'sub_title' => app()->getLocale() == 'en' ? $this->sub_title_en : $this->sub_title_ar,
            'link' => $this->link,
            'start_date' => $this->starting_date,
            'end_date' => $this->end_date,
            'image' => asset('storage/' . $this->image),
            'created_at' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,
        ];
    }
}
