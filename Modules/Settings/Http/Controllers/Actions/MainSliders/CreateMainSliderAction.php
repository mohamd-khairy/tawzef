<?php

namespace Modules\Settings\Http\Controllers\Actions\MainSliders;

use Illuminate\Support\Facades\Lang;
use Modules\Settings\MainSlider;
use Modules\Settings\MainSliderTranslation;
use Modules\Settings\Http\Resources\MainSliders\MainSliderResource;

class CreateMainSliderAction
{
    function execute($data, $translations = null)
    {
        // Create main slider
        $main_slider = MainSlider::create($data);

        // update for cache translations
        $main_slider->update();

        // Return transformed response
        return new MainSliderResource(MainSlider::find($main_slider->id));
    }
}
