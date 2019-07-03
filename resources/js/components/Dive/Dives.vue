<template>
    
<v-container>
  <v-layout row wrap>
    <v-flex xs12>
      <v-card v-for="(dive, index) in dives" :key="dive.id" class="mb-3">
        <single-dive :dive="dive" :loop="index"></single-dive>
      </v-card>
    </v-flex>
  </v-layout>
</v-container>
           
</template>

<script>
import SingleDive from './SingleDive'

  export default {
    components: {SingleDive},
    data () {
      return {
        dives: {}
      }
    },
    created() {
      axios.get('/api/dive')
      .then(res => this.dives = res.data.data)
    }
  }
</script>

<style>
    .here-map canvas {
      width: 100% !important;
    }
</style>