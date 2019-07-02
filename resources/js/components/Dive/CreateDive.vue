<template>
    <v-container>
        <v-layout row wrap>
            <v-flex xs12>
                <v-card class="elevation-12">
                <v-toolbar dark color="blue darken-4">
                    <v-toolbar-title>Create dive</v-toolbar-title>
                </v-toolbar>
                <v-form>
                <v-card-text>
                    <v-layout row wrap>
                        <v-flex xs12 sm6>
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
                        </v-flex>
                    <v-spacer></v-spacer>
                        <v-flex xs12 sm6>
                        <v-dialog
                            ref="dialog"
                            v-model="modal2"
                            :return-value.sync="time"
                            persistent
                            lazy
                            full-width
                            width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="time"
                                label="Time"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="modal2"
                            v-model="time"
                            full-width
                            >
                            <v-spacer></v-spacer>
                            <v-btn flat color="primary" @click="modal2 = false">Cancel</v-btn>
                            <v-btn flat color="primary" @click="$refs.dialog.save(time)">OK</v-btn>
                            </v-time-picker>
                        </v-dialog>
                        </v-flex>
                    </v-layout>
                    
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" type="submit">Create</v-btn>
                </v-card-actions>
                </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>

</template>

<script>
  export default {
    data () {
      return {
        date: new Date().toISOString().substr(0, 10),
        time: null,
        modal: false,
        modal2: false
      }
    }
  }
</script>