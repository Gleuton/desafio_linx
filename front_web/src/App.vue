<template>
  <div id="app">
    <h1>Mais Vendidos</h1>
    <vitrine :ranking="'mostPopular'"/>
    <h1>Produtos que baixaram de preço</h1>
    <vitrine :ranking="'priceReduction'"/>
  </div>
</template>

<script>
import vitrine from './components/Vitrine.vue'

export default {
  name: 'App',
  components: {
    vitrine
  }
}
</script>

<style scoped>
  #app h1{
    text-align: center;
    color: #704577;
    font-size: 1.4em;
    font-family: 'Roboto Mono', Monaco, courier, monospace;
    font-weight: normal;
  }
</style>
