<?php

namespace Modules\Categories\Http\Resources;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'title' => app()->getLocale() == 'en' ? $this->title_en : $this->title_ar,
            'description' => $this->description,
            'created_at' => $this->created_at ? $this->created_at->timezone(auth()->user() ? auth()->user()->timezone : 'Africa/Cairo')->toDateTimeString() : null,

        ];
    }
}
