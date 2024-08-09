<x-layout-register>
    <div id="app">
        <section class="px-6 py-8">
            <main class="max-w-4xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="bg-gray-100 shadow-lg rounded-lg p-8 lg:p-12 relative">
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('storage/' . $contact->profile_picture) }}" 
                            alt="Profile picture of {{ $contact->name }}" 
                            class="rounded-full w-24 h-24 mr-6 border-4 border-purple-500">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $contact->name }}</h1>
                            <p class="text-gray-600">{{ $contact->title }}</p>
                        </div>
                    </div>
                    <form method="POST" action="/api/contacts/{{ $contact->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">[[ name ]]</label>
                                <input type="text" name="name" id="name" value="{{ $contact->name }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="surname" class="block text-sm font-medium text-gray-700">[[ surname ]]</label>
                                <input type="text" name="surname" id="surname" value="{{ $contact->surname }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">[[ title ]]</label>
                                <input type="text" name="title" id="title" value="{{ $contact->title }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="profile_picture" class="block text-sm font-medium text-gray-700">[[ profile ]]</label>
                                <input type="file" name="profile_picture" id="profile_picture" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700">[[ address ]]</label>
                                <input type="text" name="address" id="address" value="{{ $contact->address }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">[[ phone ]]</label>
                                <input type="text" name="phone" id="phone" value="{{ $contact->phone }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">[[ email ]]</label>
                                <input type="email" name="email" id="email" value="{{ $contact->email }}" 
                                    class="mt-1 block w-full bg-pink-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex justify-center mt-8">
                            <button type="submit" 
                                class="bg-purple-500 text-white rounded-lg px-8 py-2 hover:bg-purple-600">
                                [[ loading ? 'Saving...' : 'Save' ]]
                            </button>
                        </div>

                        @if ($errors->any())
                            <div class="mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </article>
            </main>
        </section>
    </div>
</x-layout-register>
