
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { useAuthStore } from './stores/authStore';


const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        const authStore = useAuthStore(); 

        return {
            email: 'Email',
            password: 'Password',
            login: 'Login',
            welcome: 'Welcome',
            notes: 'Notes',
            contact: 'Contacts',
            signin: 'Sign In',
            image: '/images/logoBuild.jpg',
            errors: authStore.errors 
        }
    },
});

const pinia = createPinia();

app.use(pinia);
app.mount('#app');
