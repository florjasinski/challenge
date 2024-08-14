

<x-layout-register>
    <div id="app">
        <div class="max-w-6xl mx-auto py-5 space-y-8">

            <h4 class="text-3xl font-bold text-black mb-4 ml-7">Contacts</h4>

            <div class="flex justify-between items-center mb-4">
                <div class="flex-1 mr-4">
                    <x-header :contacts="$contacts"/>
                </div>

                <div class="flex-shrink-0">
                    <a href="/api/contacts/{{ $contact->id }}" class="bg-purple-500 text-white px-4 py-2 rounded-lg shadow hover:bg-purple-600 transition-colors duration-200">
                        [[ addBtn ]]
                    </a>
                </div>
            </div>

            @if($contacts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($contacts as $contact)
                        <x-contact-card :contact="$contact" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">No contacts found. Please seed the database.</p>
            @endif
        </div>
    </div>
</x-layout-register>
