
import { defineStore } from 'pinia';
import { reactive } from 'vue';

export const useContactStore = defineStore('contactStore', {
    state: () => ({
        contact: {
            name: '',
            email: '',
            phone: '',
            address: '',
            surname: '',
            title: '',
            profile_picture: '',
        },
        errors: reactive({})
    }),
    actions: {
        setContact(contactData) {
            this.contact = contactData;
        },
        setErrors(errors) {
            Object.keys(errors).forEach(key => {
                this.errors[key] = errors[key];
            });
        },
        clearErrors() {
            Object.keys(this.errors).forEach(key => {
                this.errors[key] = [];
            });
        }
    },
    getters: {
        hasErrors(state) {
            return Object.keys(state.errors).length > 0;
        }
    }
});
