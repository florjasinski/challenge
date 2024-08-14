import { createApp, ref } from 'vue'; // Asegúrate de importar 'ref' de Vue
import { Field, Form, ErrorMessage, defineRule, useForm } from 'vee-validate';
import { required, email, min, digits } from '@vee-validate/rules';
import axios from 'axios';

const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        
        defineRule('required', required);
        defineRule('email', email);
        defineRule('min', min);
        defineRule('digits', digits);

        
        const { handleSubmit, errors } = useForm();
        const errorMessages = ref({
            email: '',
            password: '',
            general: '',
            name: '',
            surname: '',
            title: '',
            address: '',
            phone: '',
            profile_picture: ''
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

        const onSubmitContact = async (values) => {
            
            Object.keys(errorMessages.value).forEach(key => errorMessages.value[key] = '');
        
            try {
                const formData = new FormData();
                formData.append('name', values.name);
                formData.append('surname', values.surname);
                formData.append('title', values.title);
                formData.append('address', values.address);
                formData.append('phone', values.phone);
                formData.append('email', values.email);

                if (values.profile_picture) {
                    formData.append('profile_picture', values.profile_picture);
                }
        
                const response = await axios.post('/api/contacts', formData);
        
                if (response.data.success) {
                    window.location.href = '/api/contacts';
                }
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    if (error.response.data.errors) {
                        errorMessages.value.name = error.response.data.errors.name ? error.response.data.errors.name.join(', ') : '';
                        errorMessages.value.surname = error.response.data.errors.surname ? error.response.data.errors.surname.join(', ') : '';
                        errorMessages.value.title = error.response.data.errors.title ? error.response.data.errors.title.join(', ') : '';
                        errorMessages.value.address = error.response.data.errors.address ? error.response.data.errors.address.join(', ') : '';
                        errorMessages.value.phone = error.response.data.errors.phone ? error.response.data.errors.phone.join(', ') : '';
                        errorMessages.value.email = error.response.data.errors.email ? error.response.data.errors.email.join(', ') : '';
                        errorMessages.value.profile_picture = error.response.data.errors.profile_picture ? error.response.data.errors.profile_picture.join(', ') : '';
                    }
                } else {
                    errorMessages.value.general = 'An unexpected error occurred. Please try again.';
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
            name: '',
            addBtn: 'Add Contact',
            nameInput: 'Name',
            phoneInput: 'Phone',
            addressInput: 'Address',
            surnameInput: 'Surname',
            profileInput : 'Profile Picture',
            titleInput: 'Title',
            emailInput: 'Email',
            image: '/images/logoBuild.jpg',
            handleSubmit: handleSubmit(onSubmit),
            handleSubmitContact: handleSubmit(onSubmitContact),
            errors,
            errorMessages,
            
        }
    },
});

app.component('Field', Field);
app.component('Form', Form);
app.component('ErrorMessage', ErrorMessage);

app.mount('#app');
