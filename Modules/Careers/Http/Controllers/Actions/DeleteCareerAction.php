<?php

namespace Modules\Careers\Http\Controllers\Actions;

use Modules\Careers\Career; 
use DB;
use Carbon\Carbon;


class DeleteCareerAction
{
    public function execute($id)
    {
        // Get the career
        $career = Career::find($id);

        // Delete the career
        $career->delete();

        // Return the response
        return null;
    }
}