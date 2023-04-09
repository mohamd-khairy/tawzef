<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use Lang;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $file_name_without_extension = pathinfo($this->file_name, PATHINFO_FILENAME);
        $extension = pathinfo($this->file_name, PATHINFO_EXTENSION);

        return [
            'id' => $this->id,
            'name' => $this->name ? $this->name : '',
            'file_name_without_extension' => $file_name_without_extension,
            'extension' => $extension,
            'file_name' => $this->file_name,
            'mime_type' => $this->mime_type ? $this->mime_type: $this->mime,
            'size' => $this->size,
            'is_deleted' => $this->deleted_at ? true : false,
            'url' => $this->path ? asset('storage/'.$this->path):asset('storage/'.$this->id.'/'.$this->file_name),
            'type' => $this->type ? $this->type : '',
            'alt' => $this->alt
        ];
    }
}
