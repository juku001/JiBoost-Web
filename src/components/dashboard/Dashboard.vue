<template>
  <div class="d-flex">
    <!-- Sidebar -->
    <div 
      ref="sidebar"
      :class="['sidebar', { 'collapsed': isCollapsed, 'mobile-visible': isMobileVisible }]"
      @click.self="closeMobileSidebar"
      @touchstart="handleTouchStart"
      @touchmove="handleTouchMove"
      @touchend="handleTouchEnd"
    >
      <div class="text-center py-3">
        <img src="@/assets/images/splash.png" alt="Logo" class="img-fluid logo-expanded" />
      </div>
      <ul class="nav flex-column">
        <li class="nav-item" v-for="item in menuItems" :key="item.route">
          <router-link class="nav-link-side" :to="item.route" active-class="active"
            :class="{ 'active': isActive(item.route) }">
            <i :class="item.icon"></i>
            <span v-if="!isCollapsed || isMobile">{{ item.label }}</span>
          </router-link>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
      <nav class="navbar navbar-light bg-light d-flex justify-content-between">
        <!-- Sidebar Toggle (Only on Small Screens) -->
        <button class="btn d-md-none" @click="toggleMobileSidebar">
          <i class="icofont-navigation-menu"></i>
        </button>

        <!-- Sidebar Toggle (Larger Screens) -->
        <button class="btn d-none d-md-block" @click="toggleSidebar">
          <i class="icofont-navigation-menu"></i>
        </button>
        <h2 style="font-size: 20px;padding-right: 10px;">JiBoost</h2>
      </nav>
      <div class="container mt-4" @click="closeMobileSidebarOnTap">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'DashboardPage',
  computed: {
    currentRoute() {
      return this.$route.path;
    }
  },
  data() {
    return {
      isCollapsed: false, // Controls sidebar collapse for large screens
      isMobileVisible: false, // Controls sidebar visibility for mobile
      touchStartX: 0, // Store touch start position for swipe gesture
      menuItems: [
        { label: 'Home', route: '/dashboard/home', icon: 'icofont-home' },
        { label: 'Exams', route: '/dashboard/exams', icon: 'icofont-ui-alarm' },
        { label: 'Results', route: '/dashboard/results', icon: 'icofont-file-alt' },
        { label: 'Payments', route: '/dashboard/payments', icon: 'icofont-mastercard-alt' },
        { label: 'Log Out', route: '/logout', icon: 'icofont-logout' },
      ]
    };
  },
  methods: {
    toggleSidebar() {
      this.isCollapsed = !this.isCollapsed;
    },
    toggleMobileSidebar() {
      this.isMobileVisible = !this.isMobileVisible;
    },
    closeMobileSidebar() {
      this.isMobileVisible = false;
    },
    closeMobileSidebarOnTap() {
      // Close the sidebar when the main content area is tapped, only for mobile
      if (this.isMobileVisible) {
        this.closeMobileSidebar();
      }
    },
    isActive(route) {
      return this.currentRoute === route;
    },
    handleTouchStart(event) {
      // Capture the starting X position of the touch
      this.touchStartX = event.touches[0].clientX;
    },
    // handleTouchMove(event) {
    //   // Optionally, handle touch move here (not necessary for closing)
    // },
    handleTouchEnd(event) {
      const touchEndX = event.changedTouches[0].clientX;
      // Check if the swipe was from right to left (greater than 50px of movement)
      if (this.isMobileVisible && this.touchStartX - touchEndX > 50) {
        this.closeMobileSidebar();
      }
    }
  }
};
</script>

<style scoped>
@import url('@/assets/css/dashboard.css');
</style>
