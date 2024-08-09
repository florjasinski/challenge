<!-- resources/views/contacts/index.blade.php -->
<x-layout-register>
    <div id = "app">
    <div class="max-w-6xl mx-auto py-10 space-y-8">
        <x-_posts-header :contacts="$contacts"/>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($contacts as $contact)
                <x-contact-card :contact="$contact" />
            @endforeach
        </div>

        
    </div>
    </div>
</x-layout-register>
