<template>
  <b-container>
    <b-row>
      <b-container fluid>
        <b-row class="my-3">
          <b-col sm="3">
            <label for="input-small">Email</label>
          </b-col>
          <b-col sm="9">
            <b-form-input
              v-model="form.email"
              size="sm"
              placeholder="Enter your email"
            ></b-form-input>
          </b-col>
        </b-row>
        <b-row class="my-3">
          <b-col sm="3">
            <label for="input-small">Password</label>
          </b-col>
          <b-col sm="9">
            <b-form-input
              v-model="form.password"
              size="sm"
              type="password"
              placeholder="Enter your password"
            ></b-form-input>
          </b-col>
        </b-row>
      </b-container>
      <b-button variant="danger" style="margin-right: 10px" @click="login"
        >Login</b-button
      >
      <b-button variant="danger" @click="fill">Fill</b-button>
    </b-row>
  </b-container>
</template>

<script>
export default {
  middleware: ['guest'],
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    }
  },
  methods: {
    login() {
      this.$auth
        .loginWith('laravelSanctum', {
          data: this.form,
        })
        .then((response) => console.log(response))
        .catch((error) => console.log(error))
    },
    fill() {
      this.form.email = 'yayanchy2@gmail.com'
      this.form.password = '12345678'
    },
  },
}
</script>
<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>
