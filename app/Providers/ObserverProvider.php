<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\ContactPhoneNumber;
use App\Observers\ContactObserver;
use App\Observers\ContactPhoneNumberObserver;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Contact::observer(ContactObserver::class);
        ContactPhoneNumber::observe(ContactPhoneNumberObserver::class);
    }
}
