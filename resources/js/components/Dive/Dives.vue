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
      this.listen()
      axios.get('/api/dive')
      .then(res => this.dives = res.data.data)
    },
    methods: {
      listen() {
        EventBus.$on('deleteDive', (index) => {
          axios.delete(`/api/dive/${this.dives[index].id}`)
            .then(res => {
                this.dives.splice(index, 1)
            })
        })
      }
    }
  }
</script>

<style>
    .here-map canvas {
      width: 100% !important;
    }
</style>