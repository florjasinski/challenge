import { createApp } from 'vue';

const app = createApp({
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
            errors: []
        }
    },
    computed: {
        hasErrors() {
            return this.errors.length > 0;
        }
    },
    mounted() {
        // Populate the errors array
        this.populateErrors();
    },
    methods: {
        populateErrors() {
           
            this.errors = 'The provided credentials do not match our records.';
        }
    }
});

app.mount('#app');