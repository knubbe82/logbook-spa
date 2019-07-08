<template>
    
<v-container>
  <v-layout row wrap>
    <v-flex xs12>
      <v-card v-for="(dive, index) in dives" :key="dive.id" class="mb-3">
        <single-dive :dive="dive" :loop="index"></single-dive>
      </v-card>
    </v-flex>
  </v-layout>
  <div class="text-xs-center">
    <v-pagination
      v-model="pagination.current"
      :length="pagination.total"
      circle
      @input="onPageChange"
    ></v-pagination>
  </div>
</v-container>
           
</template>

<script>
import SingleDive from './SingleDive'

  export default {
    components: {SingleDive},
    data () {
      return {
        dives: {},
        pagination: {
          current: 1,
          total: 0
        }
      }
    },
    created() {
      this.listen()
      // axios.get('/api/dive')
      // .then(res => this.dives = res.data.data)
      this.getDives()
    },
    methods: {
      listen() {
        EventBus.$on('deleteDive', (index) => {
          axios.delete(`/api/dive/${this.dives[index].id}`)
            .then(res => {
                this.dives.splice(index, 1)
            })
        })
      },
      getDives() {
        axios.get('/api/dive?page=' + this.pagination.current)
        .then(res => {
          this.dives = res.data.data
          this.pagination.current = res.data.meta.current_page
          this.pagination.total = res.data.meta.last_page
        })
      },
      onPageChange() {
        this.getDives()
      }
    }
  }
</script>

<style>
    .here-map canvas {
      width: 100% !important;
    }
</style>