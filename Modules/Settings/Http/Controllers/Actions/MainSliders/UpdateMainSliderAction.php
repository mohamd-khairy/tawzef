<?php

namespace Modules\Settings\Http\Controllers\Actions\MainSliders;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Modules\Settings\MainSlider;
use Modules\Settings\MainSliderTranslation;
use Modules\Settings\Http\Resources\MainSliders\MainSliderResource;

class UpdateMainSliderAction
{
    function execute($id, $data, $translations = null)
    {
        // Find main slider
        $main_slider = MainSlider::find($id);


        // Update main slider
        $main_slider->update($data);

        // Return transformed response
        return new MainSliderResource($main_slider);
    }
}
