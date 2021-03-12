export const state = () => ({
  baseloading: false,
})

export const mutations = {
  setLoading(state, text) {
    state.baseloading = text
  },
}
