<!-- resources/views/posts.blade.php -->
<x-layout-register>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-_posts-header :categories="$categories"/>

        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]"/>
        @endif

        @if ($posts->count() > 1)
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif

    </main>
</x-layout-register>
