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
          console.log(this.user.applicant)
        } else {
          // Update only User
          const response = await axios.put(`/users/${this.user.id}`, userData.user);
          
          // Assuming API response returns the updated user
          this.user = response.data;
        }
        this.persistUser();
        return { success: true, message: 'Update successful' };
      } catch (error) {
        console.error('Error updating user data', error);
        return { success: false, message: 'Update failed' };
      }
    },
    async addExperience(experienceData) {
      try {
        const response = await axios.post(`/applicants/${this.user.applicant.id}/experiences`, experienceData);
        this.user.applicant.experiences.push(response.data);
        this.persistUser();
        return { success: true, message: 'Experience added successfully' };
      } catch (error) {
        console.error('Error adding experience', error);
        return { success: false, message: 'Failed to add experience' };
      }
    },
    async updateExperience(experienceId, experienceData) {
      try {
        const response = await axios.put(`/applicants/${this.user.applicant.id}/experiences/${experienceId}`, experienceData);
        const index = this.user.applicant.experiences.findIndex(exp => exp.id === experienceId);
        if (index !== -1) {
          this.user.applicant.experiences[index] = response.data;
          this.persistUser();
        }
        return { success: true, message: 'Experience updated successfully' };
      } catch (error) {
        console.error('Error updating experience', error);
        return { success: false, message: 'Failed to update experience' };
      }
    },
    async addCertificate(certificateData) {
      try {
        const response = await axios.post(`/applicants/${this.user.applicant.id}/certificates`, certificateData);
        this.user.applicant.certificates.push(response.data);
        this.persistUser();
        return { success: true, message: 'Certificate added successfully' };
      } catch (error) {
        console.error('Error adding certificate', error);
        return { success: false, message: 'Failed to add certificate' };
      }
    },
    async updateCertificate(certificateId, certificateData) {
      try {
        const response = await axios.put(`/applicants/${this.user.applicant.id}/certificates/${certificateId}`, certificateData);
        const index = this.user.applicant.certificates.findIndex(cert => cert.id === certificateId);
        if (index !== -1) {
          this.user.applicant.certificates[index] = response.data;
          this.persistUser();
        }
        return { success: true, message: 'Certificate updated successfully' };
      } catch (error) {
        console.error('Error updating certificate', error);
        return { success: false, message: 'Failed to update certificate' };
      }
    },
    async addProject(projectData) {
      try {
        const response = await axios.post(`/applicants/${this.user.applicant.id}/projects`, projectData);
        this.user.applicant.projects.push(response.data);
        this.persistUser();
        return { success: true, message: 'Project added successfully' };
      } catch (error) {
        console.error('Error adding project', error);
        return { success: false, message: 'Failed to add project' };
      }
    },
    async updateProject(projectId, projectData) {
      try {
        const response = await axios.put(`/applicants/${this.user.applicant.id}/projects/${projectId}`, projectData);
        const index = this.user.applicant.projects.findIndex(proj => proj.id === projectId);
        if (index !== -1) {
          this.user.applicant.projects[index] = response.data;
          this.persistUser();
        }
        return { success: true, message: 'Project updated successfully' };
      } catch (error) {
        console.error('Error updating project', error);
        return { success: false, message: 'Failed to update project' };
      }
    }
  }
});