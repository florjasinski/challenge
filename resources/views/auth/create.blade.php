<x-layout-register>
    <div  id="app" class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-black">[[ welcome ]]</h1>
            </div>
            
            <form method="POST" action="/api/user">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700"> [[ email ]]</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full px-4 py-2 border rounded-lg bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700">[[ password]]</label>
                    <input type="password" name="password" id="password" required
                           class="w-full px-4 py-2 border rounded-lg bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-600">
                </div>

                <div>
                    <button type="submit"
                            class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                        [[ login ]]
                    </button>
                </div>

                <div v-if="hasErrors" class="mt-4">
                    <ul>
                        <li v-for="error in errors" :key="error" class="text-red-500">[[ error ]] </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</x-layout-register>


<script>
        const app = Vue.createApp({
            delimiters: ['[[', ']]'], 
            data() {
                return {
                    email: 'Email',
                    password: 'Password',
                    login: 'Login',
                    welcome: 'Welcome',
                    notes: 'Notes',
                    contacts: 'Contacts',
                    signin: 'Sign In',
                    image : '/images/logoBuild.jpg',
                    errors: [
                        @foreach ($errors->all() as $error)
                            '{{ $error }}',
                        @endforeach
                    ]
                }
            },
            computed: {
                hasErrors() {
                    return this.errors.length > 0;
                }
            }
        });

        app.mount('#app');
</script>
