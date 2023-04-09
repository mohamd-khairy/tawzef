<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Modules\Blog\Http\Controllers\Actions\Blog\GetFeaturedBlogsAction;
use Modules\Blog\Http\Controllers\Actions\Categories\GetCategoriesAction;
use Modules\CMS\CmsManagement;
use Modules\CMS\Http\Resources\CmsManagementResource;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Blog', 'Database/Migrations'));
        app()->make('router')->aliasMiddleware('HasBlogModule', \Modules\Blog\Http\Middleware\HasBlogModule::class);
        if (Schema::hasTable('blog_categories')) {
            $action= new GetCategoriesAction;
            $blog_categories = json_decode(json_encode($action->execute()));
            View::share('blog_categories', $blog_categories);
        }

        if (Schema::hasTable('blogs')) {
        $featured_blogs = json_decode(json_encode((new GetFeaturedBlogsAction)->execute()));
        View::share('featured_blogs', $featured_blogs);

        }
        if (Schema::hasTable('cms_managements')) {
            $social_contents = CmsManagement::where('type', 'social')->get();
            $social_contents = json_decode(json_encode(CmsManagementResource::collection($social_contents)));
            View::share('social_contents', $social_contents);

        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Blog', 'Config/config.php') => config_path('blog.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Blog', 'Config/config.php'), 'blog'
        );
        app()->make('router')->aliasMiddleware('HasBlogModule', \Modules\Blog\Http\Middleware\HasBlogModule::class);

    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/blog');

        $sourcePath = module_path('Blog', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/blog';
        }, \Config::get('view.paths')), [$sourcePath]), 'blog');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/blog');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'blog');
        } else {
            $this->loadTranslationsFrom(module_path('Blog', 'Resources/lang'), 'blog');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Blog', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
