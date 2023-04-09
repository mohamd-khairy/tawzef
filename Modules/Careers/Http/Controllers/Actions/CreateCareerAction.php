<?php

namespace Modules\Careers\Http\Controllers\Actions;

use Modules\Careers\Career;
use Modules\Careers\CareerTranslation;
use DB;
use Carbon\Carbon;
use Modules\Careers\Http\Resources\CareerResource;

class CreateCareerAction
{
    public function execute(array $data): CareerResource
    {
        $created_at = Carbon::now()->toDateTimeString();

        // Create Career
        $career = Career::create($data);
        
        // Transform the result
        $career = new CareerResource($career);

        return $career;
    }
}
