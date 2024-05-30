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
    },
    async updateUser(userData) {
      try {
        if (this.user.role === 'applicant') {
          // Update both User and Applicant

          const userResponse = await axios.put(`/users/${this.user.id}`, userData.user);
          const applicantResponse = await axios.put(`/applicants/${this.user.applicant.id}`, userData.applicant);

          // Assuming API responses return the updated user and applicant
          this.user = userResponse.data;
          this.user.applicant = applicantResponse.data;
        } else {
          // Update only User
          const response = await axios.put(`/users/${this.user.id}`, userData.user);
          
          // Assuming API response returns the updated user
          this.user = response.data;
        }
        console.log('this.user ', this.user)
        console.log('this.user.applicant', this.user.applicant)
        this.persistUser();
        return { success: true, message: 'Update successful' };
      } catch (error) {
        console.error('Error updating user data', error);
        return { success: false, message: 'Update failed' };
      }
    }
  }
});