<template>
  <div class='container'>
    <a-typography-title>Vue Library App</a-typography-title>
    <router-view></router-view>
  </div>
</template>

<script>
import FruitsList from './components/FruitsList.vue';
import FruitItem from './components/FruitItem.vue';

export default {
  components: {
    FruitsList,
    FruitItem
  }
}
</script>

<style scoped>
.container {
  padding: 2%;
}
</style>
