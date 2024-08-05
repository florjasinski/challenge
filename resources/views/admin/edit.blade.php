<x-layout-register>
    <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="container mx-auto mt-8">
            <h2 class="text-2xl font-bold mb-6">Edit Post</h2>

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ $post->title }}">
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" value="{{ $post->slug }}">
            </div>

            <div class="flex mt-6 mb-6">
                <div class="flex-1">
                    <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">Thumbnail</label>
                    <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail">
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">Excerpt</label>
                <textarea class="border border-gray-400 p-2 w-full" name="excerpt" id="excerpt">{{ $post->excerpt }}</textarea>
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">Body</label>
                <textarea class="border border-gray-400 p-2 w-full" name="body" id="body">{{ $post->body }}</textarea>
            </div>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select name="category_id" id="category_id" class="border border-gray-400 p-2 w-full">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-400 text-white rounded-lg px-8 py-2 hover:bg-blue-500">Update</button>
        </div>
    </form>
</x-layout-register>
