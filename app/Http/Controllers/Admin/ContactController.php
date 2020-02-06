<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        $clients = Client::all();
        return view('admin.contact.index', compact('contacts', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('admin.contact.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => '',
            'email' => 'unique:contacts',
            'phone_1' => '',
            'phone_2' => '',
            'client' => '',
        ]);

        $contact = new Contact();
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_1 = $request->phone_1;
        $contact->phone_2 = $request->phone_2;

        $contact->save();

        $contact->clients()->attach($request->clients);

        Toastr::success('Contact Created Successfully','Success');
        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $contact = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('clients', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name' => '',
            'last_name' => '',
            'email' => 'required',
            'phone_1' => '',
            'phone_2' => '',
            'client' => '',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone_1 = $request->phone_1;
        $contact->phone_2 = $request->phone_2;
        $contact->save();

        $contact->clients()->sync($request->clients);

        Toastr::success('Contact Updated Successfully','Success');
        return redirect()->route('contact.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->clients()->detach();

        $contact->delete();

        Toastr::success('Contact Successfully Deleted', 'Success');
        return redirect()->back();
    }
}
