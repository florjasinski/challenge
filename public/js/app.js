
import { createApp, ref } from 'vue';
import { Field, Form, ErrorMessage, defineRule, useForm } from 'vee-validate';
import { required, min, digits} from '@vee-validate/rules';
import axios from 'axios';
import { createPinia } from 'pinia';
import { useAuthStore } from './stores/authStore';
import { useContactStore } from './stores/contactStore';

const app = createApp({
    delimiters: ['[[', ']]'], 
    setup() {
        
        defineRule('required', required);
        defineRule('min', min);
        defineRule('digits', digits);

        const profile_picture = ref(null);

        const { handleSubmit } = useForm();


        const pinia = createPinia();
        const authStore = useAuthStore(pinia);
        const contactStore = useContactStore(pinia);

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


        const handleFileChange = (event) => {
            const file = event.target.files[0];
            if (file) {
                profile_picture.value = file;
            } else {
                profile_picture.value = null;
            }
        };

        
        const onSubmit = async (values) => {
           
           

            authStore.clearErrors();


        
            try {
                const response = await axios.post('/api/user', {
                    email: values.email,
                    password: values.password,
                });
        
                if (response.data.success) {
                    window.location.href = '/api/contacts';
                    authStore.setUser(response.data.user);
                }
            } catch (error) {
                if (error.response && error.response.status === 422) {
                    if (error.response.data.errors) {
                        
                        authStore.setErrors(error.response.data.errors);
                        
                          

                    }
                } else {
                    
                    authStore.setErrors({ general: 'Invalid credentials. Please try again.' });
  
                }
            }
        };

        const onSubmitContact = async (values) => {
            
            contactStore.clearErrors();

            

            if (!profile_picture.value) {
                contactStore.setErrors({ profile_picture: ['Profile picture is required.'] });
                return;
            }
        
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
                        contactStore.setErrors(error.response.data.errors);
                    }
                } else {
                    contactStore.setErrors({ general: 'An unexpected error occurred. Please try again.' });
                }
            }
        };

        

        return {
           
            login: 'Login',
            welcome: 'Welcome',
            notes: 'Notes',
            contactLayout: 'Contacts',
            signin: 'Sign In',
            nameInput: 'Name',
            phoneInput: 'Phone',
            addressInput: 'Address',
            surnameInput: 'Surname',
            profileInput : 'Profile Picture',
            titleInput: 'Title',
            emailInput: 'Email',
            image: '/images/logoBuild.jpg',
            addBtn: 'Add Contact',
            handleSubmit: handleSubmit(onSubmit),
            handleSubmitContact: handleSubmit(onSubmitContact),
            authErrors:authStore.errors,
            contactErrors:contactStore.errors,
            isAuthenticated: authStore.isAuthenticated,
            errorMessages,
            profile_picture,
            handleFileChange,
            
        }
    },
});

app.component('Field', Field);
app.component('Form', Form);
app.component('ErrorMessage', ErrorMessage);

app.use(createPinia());

app.mount('#app');