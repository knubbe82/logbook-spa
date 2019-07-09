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
                <v-toolbar-title>Registration form</v-toolbar-title>
              </v-toolbar>
              <v-form @submit.prevent="signup">
              <v-card-text>

                  <v-text-field
                   prepend-icon="person"
                   label="Name"
                   v-model="form.name"
                   type="text"
                   ></v-text-field>
                   <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
                
                  <v-text-field
                   prepend-icon="email"
                   label="E-mail"
                   v-model="form.email"
                   type="email"
                   ></v-text-field>
                   <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>

                  <v-text-field
                   prepend-icon="lock"
                   v-model="form.password"
                   name="password"
                   label="Password"
                   type="password"></v-text-field>
                   <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>

                   <v-text-field
                   prepend-icon="lock"
                   v-model="form.password_confirmation"
                   name="password"
                   label="Password"
                   type="password"></v-text-field>
                
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" type="submit">Sign Up</v-btn>
              </v-card-actions>
              </v-form>
            </v-card>
        </v-flex>

</v-container>
    </v-img>

</template>

<script>
export default {
data: () => ({
    form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
    },
    errors: {}
  }),
  created() {
    if (User.loggedIn()) {
        this.$router.push({name:'dives'})
    }
  },
  methods: {
        signup() {
            axios.post('/api/auth/signup', this.form)
                .then(res => {
                    User.responseAfterLogin(res)
                    this.$router.push({name:'dives'})
                })
                .catch(error => this.errors = error.response.data.errors)
            }
        }
}
</script>