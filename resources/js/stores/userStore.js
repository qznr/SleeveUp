// src/stores/userStore.js
import { defineStore } from 'pinia';
import axios from 'axios';

export const useUserStore = defineStore('user', {
  state: () => ({
    user: null,
  }),
  actions: {
    async fetchUser() {
      if (!this.user) {
        try {
          const response = await axios.get('/user');
          this.user = response.data.user;
        } catch (error) {
          console.error('Error fetching user data', error);
        }
      }
    },
    async logout() {
      try {
        await axios.post('/logout');
        this.user = null;
        window.location.href = '/';
      } catch (error) {
        console.error('Error during logout', error);
      }
    },
    setUser(user) {
      this.user = user;
    }
  }
});
