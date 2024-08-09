<x-layout-register>


    <section class="px-6 py-8">

        
       

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="/admin/contacts/{{ $contact->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>

                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="/api/contacts/{{ $contact->id }}" class="text-blue-500 hover:text-blue-600">Add</a>
                </td>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src= "{{ $contact->thumbnail }}" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                            <a href="/authors/{{ $contact->name }}">{{ $contact->name }}</a>
                            </h5>
                
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/contacts"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $contact->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $contact->name !!}
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <h2 class="font-bold text-2xl">Comments</h2>

                    

                    <form method="POST" action="/contacts/{{ $contact->id }}/comments" class="mt-10">
                        @csrf

                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                                class="rounded-full">

                            <h2 class="ml-4">Want to participate?</h2>
                        </header>

                        <div class="mt-6">
                            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring"
                                placeholder="Quick, think of something to say!" rows="5"></textarea>


                                <input type="text" id="address-input" placeholder="Escribe una dirección..." />
                                <ul id="results"></ul>

                                <script>
                                document.getElementById('address-input').addEventListener('keyup', function() {
                                    const address = this.value;
                                    const url = `https://photon.komoot.io/api/?q=${encodeURIComponent(address)}&limit=5`;

                                    fetch(url)
                                        .then(response => response.json())
                                        .then(data => {
                                            const resultsList = document.getElementById('results');
                                            resultsList.innerHTML = '';

                                            data.features.forEach(result => {
                                                const li = document.createElement('li');
                                                li.textContent = result.properties.name;
                                                li.addEventListener('click', function() {
                                                    document.getElementById('address-input').value = result.properties.name;
                                                    resultsList.innerHTML = '';
                                                });
                                                resultsList.appendChild(li);
                                            });
                                        })
                                        .catch(error => console.error('Error:', error));
                                });
                                </script>

                            @error('body')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-10 py-2">Post
                                Comment</button>
                        </div>
                    
                    </form>

                           



                </section>
            </article>

            {{-- 
                            @foreach ($post->comments as $comment)
                            <x-comment :comment="$comment" />
                            @endforeach 
                            --}}
        </main>
    </section>

</x-layout-register>
