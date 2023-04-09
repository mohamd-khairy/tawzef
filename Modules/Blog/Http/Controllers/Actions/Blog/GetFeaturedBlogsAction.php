<?php

namespace Modules\Blog\Http\Controllers\Actions\Blog;

use Cache;
use Modules\Blog\Blog;
use Modules\Blog\Http\Resources\BlogResource;

class GetFeaturedBlogsAction
{
    public function __construct()
    {
        //
    }
    public function execute()
    {
        // Get the blogs
        $blogs = Blog::featured()->get();

        // Transform the  Blogs
        $blogs = BlogResource::collection($blogs);

        // Return the result
        return $blogs;
    }
}
