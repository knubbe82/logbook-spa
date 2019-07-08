<template>
    <v-container>
        <v-layout row wrap>
            <v-flex xs12 sm8 md8 offset-sm2 offset-md2>
                <v-card class="elevation-12">
                <v-toolbar dark color="blue darken-4">
                    <v-toolbar-title>Create dive</v-toolbar-title>
                </v-toolbar>
                <v-form @submit.prevent="updateDive">
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
                            <span class="red--text caption" v-if="errors.time">{{ errors.time[0] }}</span>
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
                         <span class="red--text caption" v-if="errors.time">{{ errors.time[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-text-field
                        v-model="form.location"
                        label="Place, Country"
                        prepend-icon="room"
                        type="text"
                    ></v-text-field>
                    <span class="red--text caption" v-if="errors.location">{{ errors.location[0] }}</span>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.bottom_time"
                                label="Bottom time (minutes)"
                                prepend-icon="timer"
                                type="text"
                            ></v-text-field>
                             <span class="red--text caption" v-if="errors.bottom_time">{{ errors.bottom_time[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.max_depth"
                                label="Max depth (meters)"
                                prepend-icon="trending_down"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.max_depth">{{ errors.max_depth[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.water_temp"
                                label="Water temperature (celsius)"
                                prepend-icon="error_outline"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.water_temp">{{ errors.water_temp[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm3>
                            <v-radio-group v-model="form.day_night" row>
                                <v-radio label="Day" :value="0"></v-radio>
                                <v-radio label="Night" :value="1"></v-radio>
                            </v-radio-group>
                            <span class="red--text caption" v-if="errors.day_night">{{ errors.day_night[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-text-field
                                v-model="form.visibility"
                                label="Visibility (meters)"
                                prepend-icon="visibility"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.visibility">{{ errors.visibility[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-select
                                :items="start"
                                label="Dive start"
                                v-model="form.dive_start"
                                prepend-icon="directions_boat"
                            ></v-select>
                            <span class="red--text caption" v-if="errors.dive_start">{{ errors.dive_start[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm3>
                            <v-select
                                v-model="form.current"
                                :items="current"
                                label="Current"
                                prepend-icon="waves"
                            ></v-select>
                            <span class="red--text caption" v-if="errors.current">{{ errors.current[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm6>
                            <v-select
                                v-model="form.tank_type"
                                :items="tanks"
                                label="Tank type"
                                prepend-icon="battery_unknown"
                            ></v-select>
                            <span class="red--text caption" v-if="errors.tank_type">{{ errors.tank_type[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm6>
                            <v-select
                                :items="capacity"
                                label="Tank capacity"
                                v-model="form.tank_capacity"
                                prepend-icon="battery_unknown"
                            ></v-select>
                            <span class="red--text caption" v-if="errors.tank_capacity">{{ errors.tank_capacity[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.bar_start"
                                label="Bar at start"
                                prepend-icon="battery_full"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.bar_start">{{ errors.bar_start[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-text-field
                                v-model="form.bar_end"
                                label="Bar at end"
                                prepend-icon="battery_alert"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.bar_end">{{ errors.bar_end[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm4>
                            <v-select
                                v-model="form.gas_mix"
                                :items="gas"
                                label="Gas mix"
                                prepend-icon="gradient"
                            ></v-select>
                            <span class="red--text caption" v-if="errors.gas_mix">{{ errors.gas_mix[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-layout row wrap class="pa-2">
                        <v-flex xs12 sm6>
                            <v-text-field
                                v-model="form.belt_weights"
                                label="Belt weights (kg)"
                                prepend-icon="info"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.belt_weights">{{ errors.belt_weights[0] }}</span>
                        </v-flex>
                        <v-flex xs12 sm6>
                            <v-text-field
                                v-model="form.bcd_weights"
                                label="BCD weights (kg)"
                                prepend-icon="info"
                                type="text"
                            ></v-text-field>
                            <span class="red--text caption" v-if="errors.bcd_weights">{{ errors.bcd_weights[0] }}</span>
                        </v-flex>
                    </v-layout>
                    <v-divider></v-divider>
                    <v-textarea
                        outline
                        box
                        label="Description"
                        auto-grow
                        v-model="form.description"
                    ></v-textarea>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" type="submit">Update</v-btn>
                </v-card-actions>
                </v-form>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
export default {
    props: ['dive'],
    data() {
        return {
            form: {
                date: new Date(this.dive.date).toISOString().substr(0, 10),
                time: new Date(this.dive.date).toISOString().substr(11, 5),
                location: this.dive.location,
                bottom_time: this.dive.bottom_time,
                max_depth: this.dive.max_depth,
                water_temp: this.dive.water_temp,
                day_night: this.dive.day_night,
                visibility: this.dive.visibility,
                dive_start: this.dive.dive_start,
                current: this.dive.current,
                tank_type: this.dive.tank_type,
                tank_capacity: this.dive.tank_capacity,
                bar_start: this.dive.bar_start,
                bar_end: this.dive.bar_end,
                gas_mix: this.dive.gas_mix,
                belt_weights: this.dive.belt_weights,
                bcd_weights: this.dive.bcd_weights,
                description: this.dive.description,
            }, 
            modal: false,
            modal2: false,
            start: ['cave', 'wreck', 'boat', 'shore'],
            current: ['some', 'none', 'strong'],
            tanks: ['alu', 'steal'],
            capacity: ['10L', '12L', '15L', '18L'],
            gas: ['Tx', 'EAN', 'Air'],
            errors: {}
        }
    },
    // beforeMount() {
    //     if(!this.dive) {
    //         this.$router.push('/dives')
    //     }
    // },
    methods: {
        updateDive() {
            axios.patch(`/api/dive/${this.dive.id}`, this.form)
                .then(res => this.$router.push('/dives'))
                .catch(error => console.log(error.response.data))
        }
    }
}
</script>

