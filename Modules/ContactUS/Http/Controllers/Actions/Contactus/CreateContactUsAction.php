<?php

namespace Modules\ContactUS\Http\Controllers\Actions\Contactus;

use App\Http\Controllers\Actions\Users\GetUsersHaveEitherPermissionAction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;
use Modules\ContactUS\Mail\ContactUsMail as MailContactUs;
use Modules\ContactUS\ContactUs;
use Mail;
use Modules\ContactUS\Http\Resources\ContactUsResource;
use Modules\ContactUS\Jobs\MailUser;
use Modules\Notifications\Http\Helpers\NotificationObject;
use Modules\Notifications\Jobs\GeneralNotificationJob;
use Modules\Settings\Contact;

class CreateContactUsAction
{
    public function execute(array $data): ContactUsResource
    {
        // Create contact us
        $contact_us = ContactUs::create($data);

        // Trigger update contact on contact to cache its values
        $contact_us->update();

        // Reload the instance
        $contact_us = ContactUs::find($contact_us->id);
        $data['urls'] = null;
        // Job Of mailing and pass data to crm

        try {
            MailUser::dispatch($data);
        } catch (\Exception $th) {
            dd($th->getMessage());
        }

        // Transform the result
        $contact_us = new ContactUsResource($contact_us);

        return $contact_us;
    }
}
