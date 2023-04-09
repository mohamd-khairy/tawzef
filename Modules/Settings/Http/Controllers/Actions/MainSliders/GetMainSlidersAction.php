<?php

namespace Modules\Settings\Http\Controllers\Actions\MainSliders;

use Modules\Settings\MainSlider;
use Modules\Settings\Http\Resources\MainSliders\MainSliderResource;
use Cache;
use App;

class GetMainSlidersAction
{
    public function execute()
    {
        $main_sliders = MainSlider::all();

        return $main_sliders;
    }
}
