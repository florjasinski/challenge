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

    public function edit(Contact $contact)
    {
        return view('contacts.edit', [
            'contact' => $contact,
        ]);
    }

    public function update(Contact $contact)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'profile_picture' => 'required',
            'surname' => 'required',
            'title' => 'required',
            'address' => 'required',

        ]);

        if (request()->hasFile('profile_picture')) {
            $attributes['profile_picture'] = request()->file('profile_picture')->store('profile_pictures');
        }

        
        $contact->update($attributes);

        return redirect('/contacts');
    }

    public function create()
    {
        return view('contacts.create', [
            'contact' => new Contact(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'profile_picture' => 'required',
            'surname' => 'required',
            'title' => 'required',
            'address' => 'required',

        ]);

        if (request()->hasFile('profile_picture')) {
            $attributes['profile_picture'] = request()->file('profile_picture')->store('profile_pictures');
        }

        Contact::create($attributes);

        return redirect('/contacts');
    }

          
}

