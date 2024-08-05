<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index', [
            'contacts' => Contact::latest()->filter(request(['search']))->paginate()->withQueryString(),
        ]);
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', [
            'contact' => $contact,
        ]);
    }

    public function create()
    {
        return view('contacts.create', [
            'contact' => new Contact(),
        ]);
    }

   
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'title' => 'required',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('profile_picture')) {
            $attributes['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        Contact::create($attributes);

        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact)
{
    return view('contacts.edit', ['contact' => $contact]);
}

public function update(Request $request, Contact $contact)
{
    $attributes = $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'title' => 'required',
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
    ]);

    if ($request->hasFile('profile_picture')) {
        $attributes['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $contact->update($attributes);

    return redirect()->route('contacts.index');
}


}

