<?php

namespace Modules\Blog\Http\Controllers\Actions\Blog;

use Cache;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Blog\Blog;
use Modules\Blog\Http\Resources\BlogResource;

class GetBlogsFrontAction
{
    public function __construct()
    {
        //
    }
    public function execute($id, $sort = null)
    {
        // Get Blogs
        $blogs = new Blog();

        // Check if have blog category id & get data with where has this category
        if ($id) {
            $blogs = $blogs->where('category_id', $id);
        }
        if ($sort) {
            $blogs = $blogs->orderBy('created_at', $sort);
        }else{
            $blogs = $blogs->orderBy('created_at', 'desc');
        }

        // Paginate result
        $blogs = $blogs->paginate(10);

        // Transform result
        $blogs = BlogResource::collection($blogs);
        $blogs = new LengthAwarePaginator(
            json_decode(json_encode($blogs)),
            $blogs->total(),
            $blogs->perPage(),
            $blogs->currentPage(),
            [
                'path' => \Request::url(),
                'query' => [
                    'page' => $blogs->currentPage()
                ]
            ]
        );

        // Return the result
        return $blogs;
    }
}
