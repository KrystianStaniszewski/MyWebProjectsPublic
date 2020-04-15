<template>

  <div id="app">

    <img id="siviewlogo" alt="" src="./assets/logo.png">

    <ApiGouv />

  </div>

</template>

<script>

import ApiGouv from './components/ApiGouv.vue';

export default {
  name: 'app',
  components: {
    ApiGouv
  }
}

</script>

<style>

@import"css/fichier.css";

#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  font-family: Roboto;
  font-size: 16px;
  color: #212121;
  margin-top: 60px;
}

</style>
