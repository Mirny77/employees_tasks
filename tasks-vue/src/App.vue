<template>
  <div id="app">
   <header>
     <router-link :to="{name: 'users'}">Список сотрудников</router-link>
       &nbsp;
       <router-link :to="{name: 'create'}">Создать сотрудника</router-link>
   </header>
      <main>
          <div class ="content">
              <router-view></router-view>

          </div>
      </main>
  </div>
</template>

<script>
// import Users from './components/Users.vue'

export default {
  name: 'App',
  components: {
    // Users
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
