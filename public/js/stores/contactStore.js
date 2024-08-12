import { defineStore } from 'pinia';

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
        errors: {
            fields: "Please fill in all fields", 
        },
    }),
    actions: {
        setContact(contactData) {
            this.contact = contactData;
        },
        setFieldErrors(errors) {
            this.errors.fields = errors;
        },
        clearErrors() {
            this.errors = { fields: [] };
        },
    },
    getters: {
        hasFieldErrors: (state) => state.errors.fields.length > 0,
    }
});
