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
                <v-toolbar-title>Login form</v-toolbar-title>
              </v-toolbar>
              <v-form @submit.prevent="login">
              <v-card-text>
                
                  <v-text-field
                   prepend-icon="email"
                   label="E-mail"
                   v-model="form.email"
                   type="email"
                   ></v-text-field>
                  <v-text-field
                   prepend-icon="lock"
                   v-model="form.password"
                   name="password"
                   label="Password"
                   type="password"></v-text-field>
                
              </v-card-text>
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" type="submit">Login</v-btn>
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
        email: null,
        password: null
    }
  }),
  methods: {
      login() {
          axios.post('/api/auth/login', this.form)
          .then(res => console.log(res.data))
          .catch(error => console.log(error.response.data))
      }
  }
}
</script>
