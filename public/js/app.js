import { createApp, ref } from 'vue'; // Asegúrate de importar 'ref' de Vue
import { Field, Form, ErrorMessage, defineRule, useForm } from 'vee-validate';
import { required, email, min } from '@vee-validate/rules';
import axios from 'axios';

const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        // Define las reglas de validación usando Vee-Validate
        defineRule('required', required);
        defineRule('email', email);
        defineRule('min', min);

        
        const { handleSubmit, errors } = useForm();
        const errorMessages = ref({
            email: '',
            password: '',
            general: ''
        });

        const onSubmit = async (values) => {
            
            errorMessages.value.email = '';
            errorMessages.value.password = '';
            errorMessages.value.general = '';
        
            try {
                const response = await axios.post('/api/user', {
                    email: values.email,
                    password: values.password,
                });
        
                if (response.data.success) {
                    window.location.href = '/api/contacts';
                }
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    if (error.response.data.errors) {
                        errorMessages.value.email = error.response.data.errors.email ? error.response.data.errors.email.join(', ') : '';
                        errorMessages.value.password = error.response.data.errors.password ? error.response.data.errors.password.join(', ') : '';
                        errorMessages.value.general = '';
                    }
                } else {
                    errorMessages.value.general = 'Invalid credentials. Please try again.';
                }
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
            errorMessages,
            
        }
    },
});

app.component('Field', Field);
app.component('Form', Form);
app.component('ErrorMessage', ErrorMessage);

app.mount('#app');
