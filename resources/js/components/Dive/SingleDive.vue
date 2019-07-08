<template>
    <v-container fluid>
          <v-layout row wrap>
            <v-flex xs12 sm4 md3>
              <HereMap
                :location="dive.location"
                appId="JIR32DZwRYGNRc5B2Mw9"
                appCode="szAk-Zocf2xxI1yPoYJHWg"
                width="100%"
                height="200px" />
            </v-flex>
            <v-flex xs12 sm8 md9>
              <v-card-title primary-title class="py-0">
                <div class="mt-2">
                  <h3># <v-badge class="mb-2" color="blue-grey darken-4">
                          <template v-slot:badge>
                            <span>{{ dive.number }}</span>
                          </template> 
                        </v-badge>
                        <v-icon class="ml-4">calendar_today</v-icon> {{ dive.date_of_diving }}, <v-icon>access_time</v-icon> {{ dive.time_of_diving }}
                  </h3>
                  <v-divider></v-divider>
                  <div class="mt-2">
                  <p class="subheading mb-0"><v-icon>place</v-icon> {{ dive.location }}</p>
                  <p class="subheading mb-0"><v-icon>timer</v-icon> {{ dive.bottom_time }} minutes, <v-icon>trending_down</v-icon> {{ dive.max_depth }} meters, <v-icon>error_outline</v-icon> {{ dive.water_temp }} <span>&deg;</span></p>
                  <span><v-icon>notes</v-icon> {{ dive.description }} </span>
                  </div>
                </div>
              </v-card-title>
              <v-card-actions>
                <v-btn round class="primary">
                  <v-icon left>arrow_forward</v-icon>
                  View Dive
                </v-btn>
                <v-spacer></v-spacer>
                <router-link :to="{name: 'edit', params: {dive}}" style="text-decoration: none">
                  <v-btn icon>
                      <v-icon color="orange">edit</v-icon>
                  </v-btn>
                </router-link>
                <v-btn icon @click="destroy">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
              </v-card-actions>
            </v-flex>
          </v-layout>
        </v-container>
</template>

<script>
import HereMap from '../HereMap'

export default {
    props: ['dive', 'loop'],
    components: {HereMap},
    methods: {
      destroy() {
        EventBus.$emit('deleteDive', this.loop)
      }
    }
}
</script>


