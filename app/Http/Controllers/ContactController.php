<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {


        if (Contact::where('id', $id)->exists()) {

            $contact = Contact::where('id', $id)->get();

            return response($contact, 200);
        } else {

            return response()->json([
                "message" => "customer number not found."
            ], 404);

        }

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;

        $contact->contact_number = $request->contact_number;
        $contact->is_whitelisted = $request->is_whitelisted;

        $contact->save();

        return response()->json([
            "message" => "customer nubmer added.",
            "data" => $contact
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $contact = Contact::get();
       

        return response()->json([
            "data" => $contact
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (Contact::where('id', $id)->exists()) {

            $contact = Contact::find($id);

            $contact->contact_number = is_null($request->contact_number) ? $contact->contact_number : $request->contact_number;
      
            $contact->is_whitelisted = is_null($request->is_whitelisted) ? $contact->is_whitelisted : $request->is_whitelisted;

            $contact->save();

            return response()->json([
                "message" => "customer number records updated successfully.",
                "data" => $contact
            ], 200);
        } else {
            return response()->json([
                "message" => "customer contact not found."
            ], 404);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        
        if (Contact::where('id', $id)->exists()) {

            $contact = Contact::find($id);

            $contact->contact_number = is_null($request->contact_number) ? $contact->contact_number : $request->contact_number;
 
            $contact->is_whitelisted = is_null($request->is_whitelisted) ? $contact->is_whitelisted : $request->is_whitelisted;

            $contact->save();

            return response()->json([
                "message" => "customer number records updated successfully.",
                "data" => $contact
            ], 200);
        } else {
            return response()->json([
                "message" => "customer contact not found."
            ], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Contact::where('id', $id)->exists()) {
            $contact = Contact::find($id);
            $contact->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {

            return response()->json([
                "message" => "customer contact  not found."

            ], 404);
        }
    }

    public function isBlacklisted($contact_number) {
       
        if (Contact::where('contact_number', $contact_number)->exists()) {

            $contact = Contact::where('contact_number', $contact_number)->get()->first();
            
            
            return response()->json([
                "contact_number" => $contact->contact_number,
                "status_code" => 1,
                "message" => $contact->is_whitelisted == 1 ? "active" : "blocked"
            ], 200);


        } else {

            return response()->json([
                "message" => "customer number not found."
            ], 404);

        }


    }


    public function blacklist(Request $request, $id) {
        
        if (Contact::where('id', $id)->exists()) {
            $contact = Contact::find($id);


            $contact->is_whitelisted = 0;

            $contact->save();

            return response()->json([
                "message" => "customer number blacklisted."
            ], 200);
        } else {
            return response()->json([
                "message" => "customer contact not found."
            ], 404);

        }
    }
}
