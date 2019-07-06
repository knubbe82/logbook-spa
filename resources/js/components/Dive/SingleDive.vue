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
                            <span>{{ loop+1 }}</span>
                          </template>
                          
                        </v-badge>
                  </h3>
                  <v-divider></v-divider>
                  <div class="mt-2">
                  <p class="subheading mb-0">Date: {{ dive.time }}</p>
                  <p class="subheading mb-0">Location: {{ dive.location }}</p>
                  <span>Opis: {{ dive.description }} </span>
                  </div>
                </div>
              </v-card-title>
              <v-card-actions>
                <v-btn round class="primary">
                  <v-icon left>arrow_forward</v-icon>
                  View Dive
                </v-btn>
                <v-btn icon small>
                  <router-link :to="{name: 'edit', params: {dive}}">
                    <v-icon color="orange">edit</v-icon>
                  </router-link>
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
    components: {HereMap}
}
</script>


