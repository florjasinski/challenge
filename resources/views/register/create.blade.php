<x-layout-register>
    <div class="min-h-screen flex flex-col items-center justify-center bg-purple-50">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-black">Welcome</h1>
            </div>
            <form method="POST" action="/register">
                @csrf

               

                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 border rounded-lg bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 border rounded-lg bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>


                <div>
                    <button type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout-register>
