<?php

namespace Modules\Categories\Http\Controllers\Actions;

use Modules\Categories\Http\Resources\CategoryResource;
use Modules\Categories\Category;

class CreateCatAction
{
    public function execute(array $data): CategoryResource
    {
//        if(isset($data['image']) && is_file($data['image'])){
//            $data['image']=$data['image']->store('ad-images','public');
//        }
        // Create Ad
//        dd($data);
        $cat = Category::create($data);

        // Transform the result
        $cat = new CategoryResource($cat);

        return $cat;
    }
}
