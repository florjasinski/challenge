

<x-layout-register>
    <div id = "app" >     
    <section class="px-6 py-8">
        <main class="max-w-3xl mx-auto mt-10 lg:mt-20 space-y-6">

        <article class="bg-gray-100 shadow-lg rounded-lg p-8 lg:p-12 relative">
            
            
            <div class="absolute top-4 left-4 flex space-x-4">
                <a href="/api/contacts"
                    class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-black-500">
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

            
               
            <div class="absolute top-4 right-4 flex space-x-2 items-center">
                <a href="/api/contacts/{{ $contact->id }}/edit" class="hover:text-black-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black-500 hover:text-black-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="vertical-align: middle;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20h9M16.5 3a1.5 1.5 0 112.121 2.121l-9 9a1.5 1.5 0 01-.617.368l-3 1a1 1 0 01-1.263-1.263l1-3a1.5 1.5 0 01.368-.617l9-9z" />
                    </svg>
                </a>
                
                <a class="hover:text-black-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black-500 hover:text-black-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                    </svg>
                </a>

            </div>


                <div class="text-center">
                    <div class="relative inline-block">
                    <img src="{{ asset('storage/' . $contact->profile_picture) }}" 
                            alt="Profile picture of {{ $contact->name }}" 
                            class="rounded-full w-24 h-24 mr-6 border-4 border-purple-500">

                    </div>
                    <h1 class="mt-6 text-2xl font-bold text-gray-800">{{ $contact->name }}</h1>
                    <p class="text-gray-600">{{ $contact->title }}</p>

                    
                </div>

                <div class="mt-8 space-y-4 text-center">
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">[[address]]</span>
                        <span>{{ $contact->address }}</span>
                    </div>
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">[[phoneShow]]</span>
                        <span>{{ $contact->phone }}</span>
                    </div>
                    <div class="text-sm font-medium text-gray-700">
                        <span class="block">[[emailInput]]</span>
                        <span>{{ $contact->email }}</span>
                    </div>
                </div>
            </article>
        </main>
    </section>
    </div>
</x-layout-register>