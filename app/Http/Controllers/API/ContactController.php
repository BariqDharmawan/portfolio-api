<?php

namespace App\Http\Controllers\API;

use App\SosialMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $socialMedia = SosialMedia::orderBy('slug', 'ASC')->get();
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
        $contact = SosialMedia::create([
            'name' => ucwords($request->name),
            'url' => $request->url
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully add your ' . $contact->name . ' account',
            'data' => $contact
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
        $editContact = SosialMedia::findOrFail($id);
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
        $updateContact = SosialMedia::findOrFail($id);
        $updateContact->update([
            'name' => ucwords($request->name),
            'url' => $request->url
        ]);

        return response()->json([
            'success' => true,
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
        $deleteContact = SosialMedia::findOrFail($id);
        $deleteContact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully remove your ' . $deleteContact->name . ' account',
            'data' => $deleteContact
        ]);
    }
}
