<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPhoneNumber\DeleteContactPhoneNumberRequest;
use App\Http\Requests\ContactPhoneNumber\IndexContactPhoneNumberRequest;
use App\Http\Requests\ContactPhoneNumber\ShowContactPhoneNumberRequest;
use App\Http\Requests\ContactPhoneNumber\StoreContactPhoneNumberRequest;
use App\Http\Requests\ContactPhoneNumber\UpdateContactPhoneNumberRequest;
use App\Http\Resources\ContactPhoneNumberResource;
use App\Models\Contact;
use App\Models\ContactPhoneNumber;

/**
 * Class ContactPhoneNumberController
 * @package App\Http\Controllers
 */
class ContactPhoneNumberController extends Controller
{
    /**
     * @param \App\Http\Requests\ContactPhoneNumber\IndexContactPhoneNumberRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(IndexContactPhoneNumberRequest $request, Contact $contact)
    {
        return ContactPhoneNumberResource::collection($contact->phoneNumbers);
    }

    /**
     * @param \App\Http\Requests\ContactPhoneNumber\StoreContactPhoneNumberRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \App\Http\Resources\ContactPhoneNumberResource
     */
    public function store(StoreContactPhoneNumberRequest $request, Contact $contact)
    {
        $contactPhoneNumber = $contact->phoneNumbers()->create($request->validated());

        $contactPhoneNumber->loadMissing('contact');

        return ContactPhoneNumberResource::make($contactPhoneNumber);
    }

    /**
     * @param \App\Http\Requests\ContactPhoneNumber\ShowContactPhoneNumberRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactPhoneNumber $contactPhoneNumber
     *
     * @return \App\Http\Resources\ContactPhoneNumberResource
     */
    public function show(ShowContactPhoneNumberRequest $request, Contact $contact, ContactPhoneNumber $contactPhoneNumber)
    {
        $contactPhoneNumber->loadMissing('contact');

        return ContactPhoneNumberResource::make($contactPhoneNumber);
    }

    /**
     * @param \App\Http\Requests\ContactPhoneNumber\UpdateContactPhoneNumberRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactPhoneNumber $contactPhoneNumber
     *
     * @return \App\Http\Resources\ContactPhoneNumberResource
     */
    public function update(UpdateContactPhoneNumberRequest $request, Contact $contact, ContactPhoneNumber $contactPhoneNumber)
    {
        $contactPhoneNumber->update($request->validated());

        $contactPhoneNumber->loadMissing('contact');

        return ContactPhoneNumberResource::make($contactPhoneNumber);
    }

    /**
     * @param \App\Http\Requests\ContactPhoneNumber\DeleteContactPhoneNumberRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactPhoneNumber $contactPhoneNumber
     */
    public function destroy(DeleteContactPhoneNumberRequest $request, Contact $contact, ContactPhoneNumber $contactPhoneNumber)
    {
        $contactPhoneNumber->delete();
    }
}
