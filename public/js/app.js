import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { useAuthStore } from './stores/authStore';
import { useContactStore } from './stores/contactStore';

const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        const authStore = useAuthStore(); 
        const contactStore = useContactStore();

        const handleSubmit = () => {
            contactStore.validateAndSaveContact();
        };

        return {
            email: 'Email',
            password: 'Password',
            login: 'Login',
            welcome: 'Welcome',
            notes: 'Notes',
            contactLayout: 'Contacts',
            signin: 'Sign In',
            name: 'Name',
            phone: 'Phone',
            address: 'Address',
            surname: 'Surname',
            profile : 'Profile Picture',
            title: 'Title',
            image: '/images/logoBuild.jpg',
            UserErrors: authStore.errors,
            contact: contactStore.contact,
            fieldErrors: contactStore.errors.fields,
            hasFieldErrors: contactStore.hasFieldErrors,
            handleSubmit,
        }
    },
});

const pinia = createPinia();

app.use(pinia);
app.mount('#app');
