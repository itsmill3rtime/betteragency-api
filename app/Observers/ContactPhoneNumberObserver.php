<?php

namespace App\Observers;

use App\Models\ContactPhoneNumber;

class ContactPhoneNumberObserver
{
    /**
     * Handle the ContactPhoneNumber "created" event.
     *
     * @param  \App\Models\ContactPhoneNumber  $contactPhoneNumber
     * @return void
     */
    public function created(ContactPhoneNumber $contactPhoneNumber)
    {
        //
    }

    /**
     * Handle the ContactPhoneNumber "updated" event.
     *
     * @param  \App\Models\ContactPhoneNumber  $contactPhoneNumber
     * @return void
     */
    public function updated(ContactPhoneNumber $contactPhoneNumber)
    {
        //
    }

    /**
     * Handle the ContactPhoneNumber "deleted" event.
     *
     * @param  \App\Models\ContactPhoneNumber  $contactPhoneNumber
     * @return void
     */
    public function deleted(ContactPhoneNumber $contactPhoneNumber)
    {
        //
    }

    /**
     * Handle the ContactPhoneNumber "restored" event.
     *
     * @param  \App\Models\ContactPhoneNumber  $contactPhoneNumber
     * @return void
     */
    public function restored(ContactPhoneNumber $contactPhoneNumber)
    {
        //
    }

    /**
     * Handle the ContactPhoneNumber "force deleted" event.
     *
     * @param  \App\Models\ContactPhoneNumber  $contactPhoneNumber
     * @return void
     */
    public function forceDeleted(ContactPhoneNumber $contactPhoneNumber)
    {
        //
    }
}
