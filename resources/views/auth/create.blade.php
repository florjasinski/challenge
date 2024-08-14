<x-layout-register>
    <div id="app" class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-black">[[ welcome ]]</h1>
            </div>

            <Form @submit.prevent="handleSubmit">
                    <div class="mb-4">
                       
                    <label for="email"></label>
                    <Field id="email" name="email" v-model="email" placeholder="john@doe.com" 
                        class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                    </Field>
                    
                </div>

                <div class="mb-4">
                    <label for="password"></label>
                    <Field id="password" name="password" v-model="password" type="password" placeholder="**********"
                        class="w-full px-4 py-2 border rounded-lg bg-pink-100 focus:outline-none focus:ring-2 focus:ring-pink-600">
                    </Field>
                    
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-purple-600 text-white font-bold rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600">
                    [[ login ]]
                </button>


                    
                <div v-if="errors.general && errors.general.length" class="text-red-500 w-full">
                    [[ errors.general ]]
                </div>

                <div v-if="errors.email && errors.email.length" class="text-red-500">
                    <div v-for="error in errors.email" :key="error">[[ error ]]</div>
                </div>

               
                <div v-if="errors.password && errors.password.length" class="text-red-500">
                    <div v-for="error in errors.password" :key="error">[[ error ]]</div>
                </div>



               



                    
            </Form>


        </div>
    </div>
</x-layout-register>
