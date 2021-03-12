<template>
  <div>
    <b-overlay :show="show" rounded="sm">
      <b-navbar toggleable="lg" type="dark" variant="info">
        <b-navbar-brand><NuxtLink to="/">Home</NuxtLink></b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-navbar-nav class="ml-auto">
          <template v-if="$auth.loggedIn">
            <b-nav-item
              ><NuxtLink to="dashboard">dashboard</NuxtLink></b-nav-item
            >
            <b-nav-item @click.prevent="logout">logout</b-nav-item>
          </template>
          <template v-else><b-nav-item to="login">login</b-nav-item></template>
        </b-navbar-nav>
      </b-navbar>
      <Nuxt />
      <template #overlay>
        <div class="text-center">
          <b-icon icon="stopwatch" font-scale="3" animation="cylon"></b-icon>
          <p id="cancel-label">Please wait...</p>
        </div>
      </template>
    </b-overlay>
  </div>
</template>
<script>
export default {
  data() {
    return {}
  },
  computed: {
    show() {
      return this.$store.state.notif.baseloading
    },
  },
  methods: {
    async logout() {
      try {
        await this.$auth.logout()
      } catch (error) {}
    },
  },
}
</script>
