<template>
<div>
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      temporary
      app
    >
      <v-list dense>
        <v-list-tile v-for="item in items" :key="item.text" router :to="item.link" v-if="item.show">
          <v-list-tile-action>
            <v-icon>{{item.icon}}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>{{item.text}}</v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      color="blue darken-3"
      dark
      app
      fixed
    >
      <v-toolbar-side-icon
       @click.stop="drawer = !drawer"
       class="hidden-sm-and-up"></v-toolbar-side-icon>
      <v-toolbar-title>
        <router-link to="/" tag="span" style="cursor: pointer">
          LogBook
        </router-link>
      </v-toolbar-title>
    
      <v-spacer></v-spacer>

      <v-toolbar-items class="hidden-xs-only">
        <v-btn flat v-for="item in items" :key="item.text" router :to="item.link" v-if="item.show">
          <v-icon left>{{item.icon}}</v-icon>
          {{item.text}}
        </v-btn>
    </v-toolbar-items>
      
    </v-toolbar>
    
</div>
</template>

<script>
export default {
    data: () => ({
      dialog: false,
      drawer: null,
      items: [
        { icon: 'add', text: 'Add Dive', link: '/create', show: User.loggedIn() },
        { icon: 'library_books', text: 'My Dives', link: '/dives', show: User.loggedIn() },
        // { icon: 'person', text: 'Profile', link: '/profile', show: User.loggedIn() },
        { icon: 'face', text: 'Sign up', link: '/signup', show: !User.loggedIn() },
        { icon: 'lock_open', text: 'Sign in', link: '/signin', show: !User.loggedIn() },
        { icon: 'exit_to_app', text: 'Logout', link: '/logout', show: User.loggedIn() },
      ]
    }),
    created() {
        EventBus.$on('logout', () => {
            User.logout()
        })
    },
    props: {
      source: String
    }
  }
</script>
