<x-layout-register>
    <section class="px-6 py-8">
        <main class="max-w-4xl mx-auto mt-10 lg:mt-20 space-y-6">
            

            <article class="bg-white shadow-lg rounded-lg p-8 lg:p-12 relative">
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        <img src="https://i.pravatar.cc/100?u={{ $contact->email }}" alt="{{ $contact->name }}" class="w-24 h-24 rounded-full mx-auto border-4 border-white shadow-lg">
                    </div>
                    <h1 class="mt-6 text-2xl font-bold text-gray-800">{{ $contact->name }}</h1>
                    <p class="text-gray-600">{{ $contact->title }}</p>
                </div>

                <form method="POST" action="/admin/contacts" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ $contact->name }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                            <input type="text" name="surname" id="surname" value="{{ $contact->surname }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ $contact->title }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" id="address" value="{{ $contact->address }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $contact->phone }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ $contact->email }}" class="mt-1 block w-full bg-purple-100 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="flex justify-center mt-8">
                    <button type="submit" class="bg-purple-500 text-white px-6 py-3 rounded-full shadow-md hover:bg-purple-600">Save</button>
                    </div>
                </form>
            </article>
        </main>
    </section>
</x-layout-register>
