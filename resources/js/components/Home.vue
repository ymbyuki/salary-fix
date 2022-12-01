<!--
Component Content：ホーム画面用
parent-component：AppComponent
child-component：HomeOverview|HomeList
-->

<template>
  <div>
    <HomeOverview></HomeOverview>
    <HomeList></HomeList>
  </div>
</template>

<script>
import HomeOverview from './HomeOverview.vue';
import HomeList from './HomeList.vue';

export default {
  components: {
    HomeOverview,
    HomeList
  }
}
</script>