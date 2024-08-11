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
            'name' => 'required|string|min:2|max:50',
            'surname' => 'required|string|min:2|max:50',
            'title' => 'required|string|max:100',
            'profile_picture' => 'required|image',
            'address' => 'required|string|max:255',
            'phone' => 'required|digits_between:7,15',
            'email' => 'required|email|unique:contacts,email',
        ], $this->messages());

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
        'name' => 'required|string|min:2|max:50',
        'surname' => 'required|string|min:2|max:50',
        'title' => 'required|string|max:100',
        'profile_picture' => 'sometimes|image',
        'address' => 'required|string|max:255',
        'phone' => 'required|digits_between:7,15',
        'email' => 'required|email|unique:contacts,email,' . $contact->id,
    ], $this->messages());


    

    if ($request->hasFile('profile_picture')) {
        $attributes['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
    }

    $contact->update($attributes);

    return redirect()->route('contacts.index');
}

private function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.min' => 'The name must be at least 2 characters.',
            'name.max' => 'The name must not exceed 50 characters.',
            'surname.required' => 'The surname field is required.',
            'surname.min' => 'The surname must be at least 2 characters.',
            'surname.max' => 'The surname must not exceed 50 characters.',
            'title.required' => 'The title field is required.',
            'title.max' => 'The title must not exceed 100 characters.',
            'profile_picture.required' => 'The profile picture is required.',
            'profile_picture.image' => 'The profile picture must be an image.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpg, jpeg, png, gif.',
            'profile_picture.max' => 'The profile picture may not be greater than 2MB.',
            'address.required' => 'The address field is required.',
            'address.max' => 'The address must not exceed 255 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.digits_between' => 'The phone number must be between 7 and 15 digits.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
        ];
    }


}

