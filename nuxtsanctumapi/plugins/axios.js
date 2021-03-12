export default function ({ $axios, redirect }) {
  $axios.onRequest((config) => {
    config.withCredentials = true

    return config
  })
}
