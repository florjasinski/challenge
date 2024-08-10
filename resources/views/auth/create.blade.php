<x-layout-register>
    <div id="app" class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-black">[[ welcome ]]</h1>
            </div>
            
            <form method="POST" action="/api/user">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           placeholder="john@doe.com" 
                           class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" required
                           placeholder="**********"
                           class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                </div>

                <div>
                    <button type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                        [[ login ]]
                    </button>
                </div>

                <div>
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">[[ errors ]]</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            </form>
        </div>
    </div>
</x-layout-register>
