<?php

namespace Modules\Categories\Http\Controllers\Actions;


use Illuminate\Support\Facades\DB;
use Modules\Categories\Category;

class DeleteCatAction
{
    public function execute($id)
    {
        // Get the Cat
        $cat = Category::find($id);

        // Delete Cat
        $cat->delete();

        return null;
    }
}
