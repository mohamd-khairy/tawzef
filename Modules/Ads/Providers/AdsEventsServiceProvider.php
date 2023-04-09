<?php

namespace Modules\Ads\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class AdsEventsServiceProvider extends ServiceProvider
{
    protected $listen = [
        // Ad Events
        'ad.created' => [
            'Modules\Ads\Events\AdEvents@adCreated',
        ],
        'ad.updated' => [
            'Modules\Ads\Events\AdEvents@adUpdated',
        ],
        'ad.saved' => [
            'Modules\Ads\Events\AdEvents@adSaved',
        ],
        'ad.deleted' => [
            'Modules\Ads\Events\AdEvents@adDeleted',
        ],
        'ad.restored' => [
            'Modules\Ads\Events\AdEvents@adRestored',
        ],

    ];
}
