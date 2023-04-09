<?php

namespace Modules\ContactUS\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\ContactUS\Http\Controllers\Actions\Contactus\ConectContactUsWithCRMAction;
use Modules\ContactUS\Mail\ContactUsMail as MailContactUs;
use Modules\Settings\Contact;
use Mail;
use Modules\ContactUS\Mail\ThankyouMail;
use Modules\Inventory\IProject;
use Modules\Inventory\IUnit;

class MailUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Get contact  
        $contact_us_mails = Contact::where('type', 'contact_us')->get();

        // Prepare  Mail data 
        $subject = 'Contact US';
        $sender = env('MAIL_NO_REPLY');
        $best_from = isset($data['best_time_to_call_from']) && !is_null($data['best_time_to_call_from']) ? $data['best_time_to_call_from'] : '';
        $best_to = isset($data['best_time_to_call_to']) && !is_null($data['best_time_to_call_to']) ? $data['best_time_to_call_to'] : '';
        $urls=[];

        // Send  mail to receivers
        try {
            foreach ($contact_us_mails as $contact_us_mail) {
                Mail::to($contact_us_mail->value)->send(new MailContactUs($subject, $sender, $this->data, $best_from, $best_to));
            }
        } catch (\Exception $th) {
            dd($th->getMessage());
        }

    }
}
