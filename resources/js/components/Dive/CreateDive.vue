<template>
    <v-img
        dark
        src="/images/homepage.jpg"
        style="height: 100vh"
    >
    <v-container fluid fill-height align-center justify-center>
        <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <v-toolbar dark color="blue darken-4">
                <v-toolbar-title>Create dive</v-toolbar-title>
              </v-toolbar>
              <v-form>
              <v-card-text>

                  <v-dialog
                    ref="dialog"
                    v-model="modal"
                    :return-value.sync="date"
                    persistent
                    lazy
                    full-width
                    width="290px"
                >
                        <template v-slot:activator="{ on }">
                        <v-text-field
                            v-model="date"
                            label="Date"
                            prepend-icon="event"
                            readonly
                            v-on="on"
                        ></v-text-field>
                        </template>
                        <v-date-picker v-model="date" scrollable>
                        <v-spacer></v-spacer>
                        <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                        <v-btn flat color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                        </v-date-picker>
                    </v-dialog>
                
                  <v-text-field
                   prepend-icon="email"
                   label="E-mail"
                   
                   type="email"
                   ></v-text-field>

                  <v-text-field
                   prepend-icon="lock"
                  
                   name="password"
                   label="Password"
                   type="password"></v-text-field>
            
                   <v-text-field
                   prepend-icon="lock"
                  
                   name="password"
                   label="Password"
                   type="password"></v-text-field>
                
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" type="submit">Create</v-btn>
              </v-card-actions>
              </v-form>
            </v-card>
        </v-flex>

</v-container>
    </v-img>
</template>

<script>
  export default {
    data () {
      return {
        date: new Date().toISOString().substr(0, 10),
        modal: false,
      }
    }
  }
</script>