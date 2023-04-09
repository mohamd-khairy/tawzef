<?php

namespace Modules\Ads\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Ads\Ad;
use Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AdEvents
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    private function clearCaches(Ad $ad)
    {

    }

    public function adCreated(Ad $ad)
    {
        $this->clearCaches($ad);
    }
    
    public function adUpdated(Ad $ad)
    {
        $this->clearCaches($ad);
    }

    public function adSaved(Ad $ad)
    {
        $this->clearCaches($ad);
    }

    public function adDeleted(Ad $ad)
    {
        $this->clearCaches($ad);
    }

    public function adRestored(Ad $ad)
    {
        $this->clearCaches($ad);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
