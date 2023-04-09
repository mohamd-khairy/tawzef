<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use Modules\WelcomeMessages\Http\Controllers\Actions\GetWelcomeMessagesAction;
use Modules\WelcomeMessages\WelcomeMessage;

class FireWelcomeMessagesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $welcome_message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($welcome_message)
    {
        $this->welcome_message = $welcome_message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->welcome_message);
    }
}
