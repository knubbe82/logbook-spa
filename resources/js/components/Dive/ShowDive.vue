<template>
<v-dialog v-model="show" max-width="500px">
  <v-card class="elevation-12">
    <v-toolbar dark color="blue darken-4">
        <v-toolbar-title>Dive number {{ dive.number }}</v-toolbar-title>
    </v-toolbar>
    <v-card-text>
        <v-layout row wrap>
            <v-flex xs12 sm4>
                <v-icon>calendar_today</v-icon> {{ dive.date_of_diving }}
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>access_time</v-icon> {{ dive.time_of_diving }}
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>place</v-icon> {{ dive.location }}
            </v-flex>
        </v-layout>
        <v-divider class="my-2"></v-divider>
        <v-layout row wrap>
            <v-flex xs12 sm4>
                <v-icon>timer</v-icon> {{ dive.bottom_time }} minutes
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>trending_down</v-icon> {{ dive.max_depth }} meters
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>error_outline</v-icon> {{ dive.water_temp }} <span>&deg;</span>
            </v-flex>
        </v-layout>
        <v-divider class="my-2"></v-divider>
        <v-layout row wrap>
            <v-flex xs12 sm3>
                <v-icon v-if="dive.day_night">brightness_3</v-icon>
                <v-icon v-else>brightness_5</v-icon>
            </v-flex>
            <v-flex xs12 sm3>
                <v-icon>visibility</v-icon> {{ dive.visibility }} meters
            </v-flex>
            <v-flex xs12 sm3>
                <v-icon>directions_boat</v-icon> {{ dive.dive_start }}
            </v-flex>
            <v-flex xs12 sm3>
                <v-icon>waves</v-icon> {{ dive.current }}
            </v-flex>           
        </v-layout>
        <v-divider class="my-2"></v-divider>
        <v-layout row wrap>
            <v-flex xs12 sm6>
                <v-icon>battery_unknown</v-icon> {{ dive.tank_type }}
            </v-flex>
            <v-flex xs12 sm6>
                <v-icon>battery_unknown</v-icon> {{ dive.tank_capacity }}
            </v-flex>           
        </v-layout>
        <v-divider class="my-2"></v-divider>
        <v-layout row wrap>
            <v-flex xs12 sm4>
                <v-icon>battery_full</v-icon> {{ dive.bar_start }}
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>battery_alert</v-icon> {{ dive.bar_end }}
            </v-flex>
            <v-flex xs12 sm4>
                <v-icon>gradient</v-icon> {{ dive.gas_mix }}
            </v-flex>                     
        </v-layout>
        <v-divider class="my-2"></v-divider>
        <strong>Description:</strong> 
        {{ dive.description }}        
    </v-card-text>
    <v-card-actions>
        <v-spacer></v-spacer>
      <v-btn color="primary" flat @click.stop="show=false">Close</v-btn>
    </v-card-actions>
  </v-card>
</v-dialog>
</template>

<script>
export default {
  props: {
     value: Boolean,
     dive: Object
  },
  computed: {
    show: {
      get () {
        return this.value
      },
      set (value) {
         this.$emit('input', value)
      }
    }
  }
}
</script>