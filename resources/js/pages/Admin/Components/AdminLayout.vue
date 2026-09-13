<script setup lang="ts">
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
// import Navbar from './Navbar.vue'
// import Sidebar from './Sidebar.vue'

// initialize components based on data attribute selectors
// onMounted(() => {
//     initFlowbite();
// })

</script>


<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

    <!-- Navbar Start -->
                <Navbar/>
    <!-- Navbar End -->

    <!-- Sidebar Start  -->
                <Sidebar/>
    <!-- Sidebar End  -->

<!-- Sidebar Start  -->
                <slot/>
    <!-- Sidebar End  -->

  </div>
</template>

