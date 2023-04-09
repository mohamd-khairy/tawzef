<?php

namespace Modules\Blog\Http\Controllers\Actions\Blog;

use Modules\Blog\Blog;
use Modules\Blog\BlogTranslation;
use DB;
use Carbon\Carbon;
use Modules\Blog\Http\Resources\BlogResource;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileUnacceptableForCollection;

class UpdateBlogAction
{
    public function __construct()
    {
        //
    }

    public function execute($id, array $data, $attachments = null): BlogResource
    {
        $created_at = Carbon::now()->toDateTimeString();
        $updated_at = Carbon::now()->toDateTimeString();

        // Get the blog
        $blog = Blog::find($id);

        // Update/Create translations
        foreach($data['translations'] as $translation) {
            // To overcome composite primary key laravel update issue
            $blog_id = $id;
            $language_id = $translation['language_id'];
            $title = $translation['title'];
            $description = $translation['description'];

            if (isset($translation['meta_title']) && !is_null($translation['meta_title'])) {
                $meta_title = $translation['meta_title'];
            } else {
                $meta_title = $translation['title'];
            }

            if (isset($translation['meta_title']) && !is_null($translation['meta_description'])) {
                $meta_description = $translation['meta_description'];
            } else {
                $meta_description = $translation['description'];
            }

            if ($translation['language_id'] == 1) {
                $slug = str_slug($translation['title']);
            }

            $connection =  DB::table('blog_trans');


            // Check if translation exists
            $blog_trnaslation = BlogTranslation::where('blog_id', $blog_id)->where('language_id', $language_id)->first();

            if ($blog_trnaslation) {
                $connection->where('blog_id', $blog_id)->where('language_id', $language_id)->update(
                    [
                        'title' => $title,
                        'description' => $description,
                        'meta_title' => $meta_title,
                        'meta_description' => $meta_description,
                        'updated_at' => $updated_at
                    ]
                );
            } else {
                $connection->insert([
                    'blog_id' => $blog_id,
                    'language_id' => $language_id,
                    'title' => $title,
                    'description' => $description,
                    'meta_title' => $meta_title,
                    'meta_description' => $meta_description,
                    'created_at' => $created_at
                ]);
            }
        }
        if (isset($data['image']) && is_file($data['image'])) {
            $data['image'] = $data['image']->store('informations', 'public');
        }
        // Trigger update event on blog to cache its values
        $blog->update([
            'is_featured' => isset($data['is_featured']) ? $data['is_featured'] : 0,
            'category_id' => isset($data['category_id']) ? $data['category_id'] : 0,
            'image' => isset($data['image']) ?$data['image']: $blog->image,
            'updated_at' => $updated_at,
            'slug' => $slug
        ]);

        // Reload the instance
        $blog = Blog::find($blog->id);

        // Transform the result
        $blog = new BlogResource($blog);

        return $blog;
    }
}
