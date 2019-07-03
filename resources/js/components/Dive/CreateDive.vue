<template>
    <v-container>
        <v-layout row wrap>
            <v-flex xs12 sm8 md8 offset-sm2 offset-md2>
                <v-card class="elevation-12">
                <v-toolbar dark color="blue darken-4">
                    <v-toolbar-title>Create dive</v-toolbar-title>
                </v-toolbar>
                <v-form @submit.prevent="createDive">
                <v-card-text>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm6>
                            <v-dialog
                                    ref="dialog"
                                    v-model="modal"
                                    :return-value.sync="form.date"
                                    persistent
                                    lazy
                                    full-width
                                    width="290px"
                                >
                                <template v-slot:activator="{ on }">
                                <v-text-field
                                    v-model="form.date"
                                    label="Date"
                                    prepend-icon="event"
                                    readonly
                                    v-on="on"
                                ></v-text-field>
                                </template>
                                <v-date-picker v-model="form.date" scrollable>
                                <v-spacer></v-spacer>
                                <v-btn flat color="primary" @click="modal = false">Cancel</v-btn>
                                <v-btn flat color="primary" @click="$refs.dialog.save(form.date)">OK</v-btn>
                                </v-date-picker>
                            </v-dialog>
                        </v-flex>
                    <v-spacer></v-spacer>
                        <v-flex xs12 sm6>
                        <v-dialog
                            ref="dialogTime"
                            v-model="modal2"
                            :return-value.sync="form.time"
                            persistent
                            lazy
                            full-width
                            width="290px"
                        >
                            <template v-slot:activator="{ on }">
                            <v-text-field
                                v-model="form.time"
                                label="Time"
                                prepend-icon="access_time"
                                readonly
                                v-on="on"
                            ></v-text-field>
                            </template>
                            <v-time-picker
                            v-if="modal2"
                            v-model="form.time"
                            full-width
                            >
                            <v-spacer></v-spacer>
                            <v-btn flat color="primary" @click="modal2 = false">Cancel</v-btn>
                            <v-btn flat color="primary" @click="$refs.dialogTime.save(form.time)">OK</v-btn>
                            </v-time-picker>
                        </v-dialog>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-text-field
                        v-model="form.location"
                        label="Place, Country"
                        prepend-icon="room"
                        type="text"
                    ></v-text-field>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.bottom_time"
                                label="Bottom time (minutes)"
                                prepend-icon="access_time"
                                type="text"
                            ></v-text-field>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.max_depth"
                                label="Max depth (meters)"
                                prepend-icon="trending_down"
                                type="text"
                            ></v-text-field>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.water_temp"
                                label="Water temperature (celsius)"
                                prepend-icon="error_outline"
                                type="text"
                            ></v-text-field>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm3>
                            <v-radio-group v-model="form.day_night" row>
                                <v-radio label="Day" value="0"></v-radio>
                                <v-radio label="Night" value="1"></v-radio>
                            </v-radio-group>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-select
                                :items="start"
                                label="Dive start"
                                v-model="form.dive_start"
                            ></v-select>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-select
                                v-model="form.current"
                                :items="current"
                                label="Current"
                            ></v-select>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-select
                                v-model="form.tank_type"
                                :items="tanks"
                                label="Tank type"
                            ></v-select>
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
    data: () => ({
      form: {
        date: new Date().toISOString().substr(0, 10),
        time: null,
        location: null,
        bottom_time: null,
        max_depth: null,
        water_temp: null,
        day_night: null,
        visibility: null,
        dive_start: null,
        current: null,
        tank_type: null,
      },
        modal: false,
        modal2: false,
        start: ['cave', 'wreck', 'boat', 'shore'],
        current: ['some', 'none', 'strong'],
        tanks: ['alu', 'steal'],
     
    }),
    methods: {
        createDive() {
            console.log(this.form)

        }
    }
  }
</script>