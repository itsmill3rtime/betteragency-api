<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\DeleteContactRequest;
use App\Http\Requests\Contact\IndexContactRequest;
use App\Http\Requests\Contact\ShowContactRequest;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @param \App\Http\Requests\Contact\IndexContactRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(IndexContactRequest $request)
    {
        $builder = $request->user()->agency->contacts();

        //TODO:: add filters and sorts (would most likely add methods to base controller class and then would define a method in here that returns an array of filters/sorts)
        return ContactResource::collection($builder->paginate(15));
    }

    /**
     * @param \App\Http\Requests\Contact\StoreContactRequest $request
     *
     * @return \App\Http\Resources\ContactResource
     */
    public function store(StoreContactRequest $request){
        $contact = $request->user()->agency->contacts()->create($request->validated());

        return ContactResource::make($contact);
    }

    /**
     * @param \App\Http\Requests\Contact\ShowContactRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \App\Http\Resources\ContactResource
     */
    public function show(ShowContactRequest $request, Contact $contact)
    {
        return ContactResource::make($contact);
    }

    /**
     * @param \App\Http\Requests\Contact\UpdateContactRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \App\Http\Resources\ContactResource
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return ContactResource::make($contact);
    }

    /**
     * @param \App\Http\Requests\Contact\DeleteContactRequest $request
     * @param \App\Models\Contact $contact
     */
    public function destroy(DeleteContactRequest $request, Contact  $contact)
    {
        $contact->delete();
    }
}
