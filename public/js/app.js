import { createApp } from 'vue';
import { Field, Form, ErrorMessage, defineRule, useForm } from 'vee-validate';
import { required, email, min } from '@vee-validate/rules';
import axios from 'axios';

const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        defineRule('required', required);
        defineRule('email', email);
        defineRule('min', min);

        

        const { handleSubmit, errors } = useForm();

        const onSubmit = async (values) => {
            try {
                const response = await axios.post('/api/user', {
                    email: values.email,
                    password: values.password,
                });
        
                if (response.data.success) {
                    window.location.href = '/api/contacts';
                } else {
                    // Verifica si hay errores específicos en la respuesta
                    if (response.data.errors) {
                        if (response.data.errors.email) {
                            document.getElementById('email-error').innerText = response.data.errors.email;
                            document.getElementById('email-error').classList.remove('hidden');
                        }
        
                        if (response.data.errors.password) {
                            document.getElementById('password-error').innerText = response.data.errors.password;
                            document.getElementById('password-error').classList.remove('hidden');
                        }
                    }
                }
            } catch (error) {
                // Maneja errores inesperados o problemas de red
                document.getElementById('error-message').innerText = 'An unexpected error occurred.';
                document.getElementById('error-message').classList.remove('hidden');
            }
        };
        

        
        
        

        return {
            email: '',
            password: '',
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
            handleSubmit: handleSubmit(onSubmit),
            errors,
        }
    },
});

app.component('Field', Field);
app.component('Form', Form);
app.component('ErrorMessage', ErrorMessage);

app.mount('#app');
