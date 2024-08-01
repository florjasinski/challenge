@props(['comment'])

<div class="max-w-sm mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl p-8 relative">
    <div class="text-center">
        <img class="h-24 w-24 rounded-full mx-auto border-2 border-purple-500" src="{{ $comment->author->profile_picture ?? 'path-to-default-image.jpg' }}" alt="Profile Picture">
        <div class="mt-4">
            <h1 class="text-lg font-bold">{{ $comment->post->author->email }}</h1>
            <p class="text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</p>
        </div>
        <div class="mt-6 text-left">
            <p class="text-gray-700">{{ $comment->body }}</p>
        </div>
    </div>
    <div class="absolute top-0 right-0 mt-4 mr-4 flex space-x-2">
        <a href="#" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16m16-16v16m-6-16h6m-6 16h6m-10 0H4m0 0H4m0 0v-2m0 0V4m0 0H4m0 0H4m6 0h10m-10 0v16m0 0V4m0 0h10" />
            </svg>
        </a>
        <a href="#" class="text-gray-400 hover:text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v16m16-16v16m-6-16h6m-6 16h6m-10 0H4m0 0H4m0 0v-2m0 0V4m0 0H4m0 0H4m6 0h10m-10 0v16m0 0V4m0 0h10" />
            </svg>
        </a>
    </div>
</div>
