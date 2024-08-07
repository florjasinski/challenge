<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
    $user = auth()->user();

    return view('contacts.index', [
        'contacts' => Contact::where('user_id', $user->id)
                            ->latest()
                            ->filter(request(['search']))
                            ->paginate()
                            ->withQueryString(),
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
            'profile_picture' => 'required|image',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $attributes['user_id'] = auth()->id();

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
        'profile_picture' => 'required|image',
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

