<?php

namespace Modules\Careers\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Careers\Career;
use Cache;
use LaravelLocalization;

class CareerEvents
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private function clearCaches(Career $career)
    {
    }

    public function careerCreated(Career $career)
    {
        $this->clearCaches($career);
    }

    public function careerUpdated(Career $career)
    {
        $this->clearCaches($career);
    }

    public function careerSaved(Career $career)
    {
        $this->clearCaches($career);
    }

    public function careerDeleted(Career $career)
    {
        $this->clearCaches($career);
    }

    public function careerRestored(Career $career)
    {
        $this->clearCaches($career);
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
