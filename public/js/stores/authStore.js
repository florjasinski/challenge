
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('authStore', {
  state: () => ({
    user: null,
    errors: "The provided credentials do not match our records."
  }),
  actions: {
    setUser(userData) {
      this.user = userData;
    },
    setErrors(errors) {
      this.errors = errors;
    },
    clearErrors() {
      this.errors = [];
    }
  },
  getters: {
    isAuthenticated: (state) => !!state.user,
    hasErrors: (state) => state.errors.length > 0
  }
});
