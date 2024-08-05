<x-layout-register>
    <form method="CONTACT" action="/admin/contacts/{{ $contact->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="container mx-auto mt-8">
            <h2 class="text-2xl font-bold mb-6">Edit Contact</h2>

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ $contact->title }}">
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{ $contact->name }}">
            </div>

            <div class="flex mt-6 mb-6">
                <div class="flex-1">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail">
                </div>

                <img src="{{ asset('storage/' . $contact->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt">{{ $contact->password }}</textarea>
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea class="border border-gray-400 p-2 w-full" name="body" id="body">{{ $contact->email }}</textarea>
            </div>

            

            <button type="submit" class="bg-blue-400 text-white rounded-lg px-8 py-2 hover:bg-blue-500">Update</button>
        </div>
    </form>
</x-layout-register>
