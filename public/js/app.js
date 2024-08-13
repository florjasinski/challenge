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

        const validateEmail = (value) => {
            if (!value) {
                return 'This field is required';
            }
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
                return 'This field must be a valid email';
            }
            return true;
        };

        const validatePassword = (value) => {
            if (!value) {
                return 'Password is required';
            }
            if (value.length < 6) {
                return 'Password must be at least 6 characters';
            }
            return true;
        };


        

        const onSubmit = async (values) => {
            try {
                const response = await axios.post('/api/user', {
                    email: values.email,
                    password: values.password,
                });
        
                if (response.data.success) {
                    window.location.href = '/api/contacts';
                } else {
                    document.getElementById('error-message').classList.remove('hidden');
                }
            } catch (error) {
                document.getElementById('error-message').classList.remove('hidden');
            }
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
            validateEmail,
            validatePassword,
            handleSubmit: handleSubmit(onSubmit),
            errors,
        }
    },
});

app.component('Field', Field);
app.component('Form', Form);
app.component('ErrorMessage', ErrorMessage);

app.mount('#app');
