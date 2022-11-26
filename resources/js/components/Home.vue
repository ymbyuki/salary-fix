<template>
    <div>
        <h1>HOME</h1>
        
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
  },
  data() {
    return {
      result:[]
    }
  },
  mounted () {
    axios.get("/api/getYearAllSalary").then((response) => (this.result = response.data));
  }
}


</script>