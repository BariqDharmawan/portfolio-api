<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{

    protected function saveContact(Contact $contact, Request $request)
    {
        $contactName = $request->name;

        $contact->name = Str::ucfirst($contactName);
        $contact->slug = Str::slug($contactName);
        $contact->value = $request->value;
        $contact->user_id = $request->user_id;
        $contact->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $socialMedia = Contact::orderBy('name', 'ASC')->get();
        return response()->json($socialMedia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContactRequest  $request
     * @return JsonResponse
     */
    public function store(ContactRequest $request)
    {
        $newContact = new Contact;
        $this->saveContact($newContact, $request);

        return response()->json([
            'message' => 'Successfully add your ' . $newContact->name . ' account',
            'data' => $newContact
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $editContact = Contact::findOrFail($id);
        return response()->json($editContact);
    }

    /**
     * Update the specified resource.
     *
     * @param ContactRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ContactRequest $request, $id)
    {
        $updateContact = Contact::findOrFail($id);
        $this->saveContact($updateContact, $request);

        return response()->json([
            'message' => 'Successfully update your ' . $updateContact->name . ' account',
            'data' => $updateContact
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $deleteContact = Contact::findOrFail($id);
        $deleteContact->delete();

        return response()->json([
            'message' => 'Successfully remove your ' . $deleteContact->name . ' account'
        ]);
    }
}
