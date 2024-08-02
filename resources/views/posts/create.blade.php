<x-layout-register>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" required>
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" required>
            </div>

            <div class="mb-6">
                <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail" required>
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt" required></textarea>
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea class="border border-gray-400 p-2 w-full" name="body" id="body" required></textarea>
            </div>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-purple-500 text-white px-6 py-3 rounded-full shadow-md hover:bg-purple-600">Publish</button>
        </form>
    
</x-layout-register>
