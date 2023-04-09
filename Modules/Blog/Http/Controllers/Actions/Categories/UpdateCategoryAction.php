<?php

namespace Modules\Blog\Http\Controllers\Actions\Categories;

use Modules\Blog\BlogCategory;
use Modules\Blog\BlogCategoryTranslation;
use DB;
use Carbon\Carbon;
use Modules\Blog\Http\Resources\BlogCategoryResource;

class UpdateCategoryAction
{
    public function execute($id, array $data): BlogCategoryResource
    {
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();

        // Get the blog category
        $blog_category = BlogCategory::find($id);

        // Update/Create translations
        for ($i = 0; $i < count($data['translations']); $i++) {
            // To overcome composite primary key laravel update issue
            $blog_category_id = $id;
            $language_id = $data['translations'][$i]['language_id'];
            $title = $data['translations'][$i]['title'];

            // Check if translation exists
            $blog_category_trnaslation = BlogCategoryTranslation::where('blog_category_id', $blog_category_id)->where('language_id', $language_id)->first();

            if ($blog_category_trnaslation) {
                DB::table('blog_category_trans')->where('blog_category_id', $blog_category_id)->where('language_id', $language_id)->update(
                    [
                        'title' => $title,
                        'updated_at' => $updated_at
                    ]
                );
            } else {
                DB::table('blog_category_trans')->insert([
                    'blog_category_id' => $blog_category_id,
                    'language_id' => $language_id,
                    'title' => $title,
                    'created_at' => $created_at
                ]);
            }
        }

        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = $data['image']->store('informations', 'public');
        }
        // Trigger update event on blog category to cache its values
        $blog_category->update([
            'order' => isset($data['order']) ? $data['order'] : 0,
            'updated_at' => $updated_at,
            'image' => isset($data['image']) ?$data['image'] : $blog_category->image
        ]);

        // Reload the instance
        $blog_category = BlogCategory::find($blog_category->id);

        // Transform the result
        $blog_category = new BlogCategoryResource($blog_category);

        return $blog_category;
    }
}
