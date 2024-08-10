import { createApp } from 'vue';
import { createPinia } from 'pinia';

const app = createApp({
    delimiters: ['[[', ']]'], 
    data() {
        return {
            email: 'Email',
            name: 'Name',
            surname : 'Surname',
            title : 'Title',
            profile : 'Profile Picture',
            address : 'Address',
            phone : 'Phone',
            password: 'Password',
            contact : 'Contact',
            login: 'Login',
            welcome: 'Welcome',
            notes: 'Notes',
            contacts: 'Contacts',
            signin: 'Sign In',
            image : '/images/logoBuild.jpg',
            loading : false,
            errors: []
        }
    },
    methods: {
        submitForm() {
            this.loading = true;
            this.loading = false;
        },
        populateErrors() {
            this.errors = 'The provided credentials do not match our records.';
        },
    computed: {
        hasErrors() {
            return this.errors.length > 0;
        }
    },
    mounted() {
        this.populateErrors();
        
         
    },
}
});




app.use(createPinia());
app.mount('#app');


