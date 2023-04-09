<?php

namespace Modules\Ads\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Modules\Ads\Http\Controllers\Actions\GetAdsAction;

class AdsServiceProvider extends ServiceProvider
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
        $this->loadMigrationsFrom(module_path('Ads', 'Database/Migrations'));
        app()->make('router')->aliasMiddleware('HasAdsModule', \Modules\Ad\Http\Middleware\HasAdsModule::class);
        if (Schema::hasTable('ads')) {
            $ads = json_decode(json_encode((new GetAdsAction)->execute()));
            View::share('ads', $ads);
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
            module_path('Ads', 'Config/config.php') => config_path('ads.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Ads', 'Config/config.php'),
            'ads'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/ads');

        $sourcePath = module_path('Ads', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], 'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/ads';
        }, \Config::get('view.paths')), [$sourcePath]), 'ads');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/ads');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'ads');
        } else {
            $this->loadTranslationsFrom(module_path('Ads', 'Resources/lang'), 'ads');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Ads', 'Database/factories'));
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
