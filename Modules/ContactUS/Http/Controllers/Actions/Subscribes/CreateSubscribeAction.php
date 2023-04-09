<?php

namespace Modules\ContactUS\Http\Controllers\Actions\Subscribes;

use Modules\ContactUS\Subscribe;
use Modules\ContactUS\Http\Resources\SubscribeResource;
use App\Http\Controllers\Actions\Users\GetUsersHaveEitherPermissionAction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Modules\Notifications\Http\Helpers\NotificationObject;
use Modules\Notifications\Jobs\GeneralNotificationJob;

class CreateSubscribeAction
{
    public function execute(array $data): SubscribeResource
    {
        // Create subscribe
        $subscribe = Subscribe::create($data);

        // Transform the result
        $subscribe = new SubscribeResource($subscribe);

        return $subscribe;
    }
}
