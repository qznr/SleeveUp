import { defineStore } from 'pinia';
import axios from 'axios';

export const useUserStore = defineStore('user', {
  state: () => ({
    user: JSON.parse(localStorage.getItem('user')) || null,
  }),
  actions: {
    async fetchUser() {
      if (!this.user) {
        try {
          const response = await axios.get('/user');
          this.user = response.data.user;
          this.persistUser();
        } catch (error) {
          console.error('Error fetching user data', error);
        }
      }
    },
    async logout() {
      try {
        await axios.post('/logout');
        this.clearUser();
        window.location.href = '/';
      } catch (error) {
        console.error('Error during logout', error);
      }
    },
    setUser(user) {
      this.user = user;
      this.persistUser();
    },
    persistUser() {
      localStorage.setItem('user', JSON.stringify(this.user));
    },
    clearUser() {
      this.user = null;
      localStorage.removeItem('user');
    }
  }
});