<template>
  <section class="max-w-screen mx-auto py-4 px-4 md:px-8">
    <div class="background-image absolute inset-0 w-full h-full bg-cover bg-center"></div>
    <div class="max-w-xl px-8 pb-64">
      <div class="pt-96 py-4">
        <h3 class="text-3xl text-gray-100 font-semibold md:text-4xl">
          Your world and opportunities, unlocked.
        </h3>
        <p class="text-gray-100 leading-relaxed mt-3">
          SleeveUp is your one-stop platform to launch your career into the stratosphere. We're more than just a job board - we're a supportive community, a knowledge hub, and a springboard to success.
        </p>
      </div>
      <a href="javascript:void(0)" class="group px-4 py-2 text-white font-medium bg-indigo-600 rounded-md inline-flex items-center">
          Check it out!
      </a>
    </div>
  </section>
</template>


<style scoped>
.background-image {
  background-image: linear-gradient(to right, rgba(255, 150, 200, 0.3), rgba(255, 255, 255, 0.05)), 
                    url('https://images.pexels.com/photos/4385543/pexels-photo-4385543.jpeg'); /* Replace with your image path */
  z-index: -1; /* Ensure the background is behind other content */
  height: 110vh;
}
</style>
