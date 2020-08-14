<?php

namespace App\Http\Controllers\API;

use App\SosialMedia;
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
     * @return Response
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
     * @return Response
     */
    public function store(ContactRequest $request, $id)
    {
        $contact = SosialMedia::updateOrCreate(
            ['id' => $id],
            ['name' => $request->name, 'url' => $request->url]
        );

        $message = '';
        $jsonCode = '';
        switch ($request->method()) {
            case 'POST':
                $message = 'succesfully add new contact';
                $jsonCode = 201;
                break;
            case 'PUT':
                $message = 'Succesfully update your ' . $updateSocial->name . ' detail';
                $jsonCode = 200;
            break;
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $contact
        ], $jsonCode);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Response
     */
    public function show($id)
    {
        $editContact = SosialMedia::findOrFail($id);
        return response()->json($editContact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $deleteSosmed = SosialMedia::findOrFail($id);
        $deleteSosmed->delete();
        return 'Succesfully remove your ' . $deleteSosmed->name . ' account';
    }
}
