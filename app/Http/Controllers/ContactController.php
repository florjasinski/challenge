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
        return view('posts.show', [
            'contact' => $contact,
        ]);
    }

    public function edit(Contact $contact)
    {
        return view('admin.edit', ['contact' => $contact]);
    }


    

}

