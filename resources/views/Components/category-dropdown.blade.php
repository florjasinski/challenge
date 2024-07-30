<x-dropdown>
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full inline-flex">
                        {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

                        <svg class="transform -rotate-90 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </x-slot>

                <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>
                @foreach ($categories as $category)
                    <x-dropdown-item href="/?category={{ $category->slug }}"
                        :active="request()->is('categories/' . $category->slug)">
                        {{ ucwords($category->name) }}
                    </x-dropdown-item>
                @endforeach
</x-dropdown>