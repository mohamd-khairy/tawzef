<?php

namespace Modules\Categories\Http\Controllers\Actions;

use Modules\Categories\Http\Resources\CategoryResource;
use Modules\Categories\Category;

class UpdateCatAction
{

    public function execute($id, array $data): CategoryResource
    {
        // Get Cat
        $cat = Category::find($id);

        // Update Cat
        // Trigger update Ad on Ad to cache its values
        $cat->update($data);

        // Transform the result
        $cat = new CategoryResource($cat);

        // Return the response
        return $cat;
    }
}
