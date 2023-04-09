<?php

namespace Modules\Careers\Http\Controllers\Actions;

use Modules\Careers\Career;
use Modules\Careers\CareerTranslation;
use DB;
use Carbon\Carbon;

use Modules\Careers\Http\Resources\CareerResource;

class UpdateCareerAction
{
    public function execute($id, array $data): CareerResource
    {
        // Get the career
        $career = Career::find($id);
        $career->update($data);

        // Transform the result
        $career = new CareerResource($career);

        return $career;
    }
}
