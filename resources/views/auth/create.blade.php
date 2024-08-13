<x-layout-register>
    <div id="app" class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-black">[[ welcome ]]</h1>
            </div>

            <Form @submit.prevent="handleSubmit">
                <div class="mb-4">
                    <Field name="email" v-model="email" placeholder="john@doe.com"
                        :rules="validateEmail"
                        class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                    </Field>
                    
                </div>
                <div class="mb-4">
                    <Field name="password"  v-model="password" placeholder="**********"
                        :rules="validatePassword"
                        class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                    </Field>
                    
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    [[ login ]]
                </button>

                

                    <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                        <span class="block sm:inline">Invalid credentials</span>
                        
                    </div>

                    <div id="email-error" class="hidden text-red-500"></div>

                    <div id="password-error" class="hidden text-red-500"></div>



                    
            </Form>


        </div>
    </div>
</x-layout-register>
