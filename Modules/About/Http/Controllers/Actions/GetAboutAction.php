<?php

namespace Modules\About\Http\Controllers\Actions;

use Modules\About\About;
use Modules\About\Http\Resources\AboutResource;
use Cache;
use App;

class GetAboutAction
{
    public function execute()
    {
	        // Get about_sections
	        $about_sections = About::where('is_featured',0)->get();

            // Transform the about_sections
            $about_sections = AboutResource::collection($about_sections);

            return $about_sections;
    }
}
