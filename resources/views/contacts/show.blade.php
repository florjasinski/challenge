<x-layout-register>
    <section class="px-6 py-8">
        <main class="max-w-3xl mx-auto mt-10 lg:mt-20 space-y-6">
            <!-- Back to Contacts button -->
            <div class="flex justify-start mb-4">
                <a href="/api/contacts"
                    class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                            <path class="fill-current"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                    Back to Contacts
                </a>
            </div>

            <article class="bg-white shadow-lg rounded-lg p-8 lg:p-12 relative">
               
                <div class="absolute top-4 right-4 flex space-x-2">
                    <a href="/api/contacts/{{ $contact->id }}/edit" class="bg-blue-500 text-white px-3 py-1 rounded-full hover:bg-blue-600">
                        Edit
                    </a>
                    <a href="/api/contacts/{{ $contact->id }}" class="bg-green-500 text-white px-3 py-1 rounded-full hover:bg-green-600">
                        Add
                    </a>
                </div>

                <div class="text-center">
                    <div class="relative inline-block">
                    <img src="{{ Str::startsWith($contact->profile_picture, 'http') ? $contact->profile_picture : asset('storage/' . $contact->profile_picture) }}" 
                        alt="Profile picture of {{ $contact->name }}" 
                        class="rounded-full w-12 h-12">

                    </div>
                    <h1 class="mt-6 text-2xl font-bold text-gray-800">{{ $contact->name }}</h1>
                    <p class="text-gray-600">{{ $contact->title }}</p>
                </div>

                <div class="mt-8 space-y-4 text-center">
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">Address</span>
                        <span>{{ $contact->address }}</span>
                    </div>
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">Phone</span>
                        <span>{{ $contact->phone }}</span>
                    </div>
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">Email</span>
                        <span>{{ $contact->email }}</span>
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-layout-register>
