<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('backend.pages.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            Contact::create($request->validated());

            return redirect()->route('admin.contacts.index')->with('success', 'Contact saved successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
      public function edit(Contact $contact)
    {
        return view('backend.pages.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
     public function update(StoreContactRequest $request, Contact $contact)
    {
        try {
            $contact->update($request->validated());

            return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contacts.index')->with('error', 'Something went wrong!');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}