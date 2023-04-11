<?php

namespace Modules\Careers\Http\Controllers\Actions;

use Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Careers\Career;
use Modules\Careers\Http\Resources\CareerResource;

class GetCareersFrontAction
{
    public function __construct()
    {
        //
    }
    public function execute()
    {
        // Get Careers
        $careers =  Career::all();

        // Transform result
        $careers = CareerResource::collection($careers);

        // Return the result
        return $careers;
    }
}
