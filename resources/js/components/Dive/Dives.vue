<template>
    
<v-container>
  <v-layout row wrap>
    <v-flex xs12>
      <v-card v-for="(dive, index) in dives" :key="dive.id" class="mb-3">
        <v-container fluid>
          <v-layout row wrap>
            <v-flex xs12 sm4 md3>
              <v-img
                src="/images/dive.jpg"
              
              ></v-img>
            </v-flex>
            <v-flex xs12 sm8 md9>
              <v-card-title primary-title class="py-0">
                <div>
                  <h3 class="headline mb-0">Broj: {{ index+1 }}</h3>
                  <p class="subheading mb-0">Vreme: {{ dive.time }}</p>
                  <p class="subheading mb-0">Lokacija: {{ dive.location }}</p>
                  <span>Opis: {{ dive.description }} </span>
                </div>
              </v-card-title>
              <v-card-actions>
                <v-btn flat>
                  <v-icon left>arrow_forward</v-icon>
                  Pogledaj
                </v-btn>
              </v-card-actions>
            </v-flex>
          </v-layout>
        </v-container>
      </v-card>
    </v-flex>
  </v-layout>
</v-container>
           
</template>

<script>
  export default {
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