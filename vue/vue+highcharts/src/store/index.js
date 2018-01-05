import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app'
import getters from './getters'
Vue.use(Vuex);
const store = new Vuex.Store({
  modules: {
    app
  },
  state: {
    token: ''
  },
  getters,
  mutations: {
      // 同步
      login (state, token) {
          state.token = token;
          console.log(state)
      },
      loginOut (state, token) {
          state.token = token;
          console.log(state)
      }
  },
  actions: {
      // 异步 （ajax请求）
  }
});

export default store
