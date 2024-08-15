import { defineStore } from 'pinia';
import { reactive } from 'vue';

export const useAuthStore = defineStore('authStore', {
  state: () => ({
    user: {
      email: '',
      password: ''
    },
    errors: reactive({})
  }),
  actions: {
    setUser(userData) {
      this.user = userData;
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
    isAuthenticated: (state) => !!state.user,
    hasErrors: (state) => Object.keys(state.errors).length > 0
  }
});
