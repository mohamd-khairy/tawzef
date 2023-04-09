<?php

namespace Modules\Settings\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Modules\Settings\MainSlider;
use Cache;
use LaravelLocalization;

class MainSliderEvents
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private function clearCaches(MainSlider $main_slider)
    {
    }

    public function mainsliderCreated(MainSlider $main_slider)
    {
        $this->clearCaches($main_slider);
    }

    public function mainsliderUpdated(MainSlider $main_slider)
    {
        $this->clearCaches($main_slider);
    }

    public function mainsliderSaved(MainSlider $main_slider)
    {
        $this->clearCaches($main_slider);
    }

    public function mainsliderDeleted(MainSlider $main_slider)
    {
        $this->clearCaches($main_slider);
    }

    public function mainsliderRestored(MainSlider $main_slider)
    {
        $this->clearCaches($main_slider);
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
