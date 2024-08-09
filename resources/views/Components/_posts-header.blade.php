<!-- resources/views/components/_posts-header.blade.php -->
@props(['categories', 'currentCategory'])

<header class="max-w-full mx-auto mt-5 px-6">
    <h2 class="text-2xl font-bold mb-2 text-left">[[ contacts ]]</h2> <!-- Ajuste de tamaño de fuente y margen inferior -->

    <div class="relative max-w-full mx-auto flex items-center bg-gray-200 rounded-lg shadow-lg">
        <form method="GET" action="/api/contacts" class="w-full flex items-center">
            <input 
                type="text" 
                name="search" 
                placeholder="Search..." 
                class="bg-transparent placeholder-gray-500 text-black font-medium text-lg w-full py-2 px-4 rounded-l-lg focus:outline-none" 
                value="{{ request('search') }}"
            >
            <button type="submit" class="px-4 py-2 bg-gray-200 text-gray-500 rounded-r-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1112 4.5a7.5 7.5 0 014.35 12.15z"></path>
                </svg>
            </button>
        </form>
    </div>
</header>
