<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactNote\DeleteContactNoteRequest;
use App\Http\Requests\ContactNote\IndexContactNoteRequest;
use App\Http\Requests\ContactNote\ShowContactNoteRequest;
use App\Http\Requests\ContactNote\StoreContactNoteRequest;
use App\Http\Requests\ContactNote\UpdateContactNoteRequest;
use App\Http\Resources\ContactNoteResource;
use App\Models\Contact;
use App\Models\ContactNote;

/**
 * Class ContactNoteController
 * @package App\Http\Controllers
 */
class ContactNoteController extends Controller
{
    /**
     * @param \App\Http\Requests\ContactNote\IndexContactNoteRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(IndexContactNoteRequest $request, Contact $contact)
    {
        $builder = $contact->notes();

        return ContactNoteResource::collection($builder->paginate(15));
    }

    /**
     * @param \App\Http\Requests\ContactNote\StoreContactNoteRequest $request
     * @param \App\Models\Contact $contact
     *
     * @return \App\Http\Resources\ContactNoteResource
     */
    public function store(StoreContactNoteRequest $request, Contact $contact)
    {
        $contactNote = $contact->notes()->create($request->validated());

        return ContactNoteResource::make($contactNote);
    }

    /**
     * @param \App\Http\Requests\ContactNote\ShowContactNoteRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactNote $contactNote
     *
     * @return \App\Http\Resources\ContactNoteResource
     */
    public function show(ShowContactNoteRequest $request, Contact $contact, ContactNote $contactNote)
    {
        return ContactNoteResource::make($contactNote);
    }

    /**
     * @param \App\Http\Requests\ContactNote\UpdateContactNoteRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactNote $contactNote
     *
     * @return \App\Http\Resources\ContactNoteResource
     */
    public function update(UpdateContactNoteRequest $request, Contact $contact, ContactNote $contactNote)
    {
        $contactNote->update($request->validated());

        return ContactNoteResource::make($contactNote);
    }

    /**
     * @param \App\Http\Requests\ContactNote\DeleteContactNoteRequest $request
     * @param \App\Models\Contact $contact
     * @param \App\Models\ContactNote $contactNote
     */
    public function destroy(DeleteContactNoteRequest $request, Contact $contact, ContactNote $contactNote)
    {
        $contactNote->delete();
    }
}
