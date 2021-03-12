<template>
  <div v-if="loading" class="loading-page">
    <b-spinner
      style="width: 3rem; height: 3rem"
      label="Large Spinner"
    ></b-spinner>
  </div>
</template>

<script>
export default {
  data: () => ({
    loading: false,
  }),
  methods: {
    start() {
      this.loading = true
    },
    finish() {
      this.loading = false
    },
  },
}
</script>

<style scoped>
.loading-page {
  position: fixed;
  width: 100%;
  height: 100%;
}
</style>
