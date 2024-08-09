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
            
        }
    },
    computed: {
        hasErrors() {
            return this.errors.length > 0;
        }
    }
});

app.mount('#app');