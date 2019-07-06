import Vue from 'vue'
import VueRouter from 'vue-router'

import Homepage from '../components/Homepage'
import Dive from '../components/Dive/dives'
import CreateDive from '../components/Dive/CreateDive'
import Profile from '../components/User/Profile'
import Signin from '../components/User/Signin'
import Signup from '../components/User/Signup'
import Logout from '../components/User/Logout'
import EditDive from '../components/Dive/EditDive'

Vue.use(VueRouter)



const routes = [
    { path: '/', component: Homepage },
    { path: '/dives', component: Dive, name: 'dives' },
    { path: '/create', component: CreateDive },
    { path: '/profile', component: Profile },
    { path: '/signin', component: Signin },
    { path: '/signup', component: Signup },
    { path: '/logout', component: Logout },
    { path: '/edit/:id', name: 'edit', props: true, component: EditDive },
  ]

const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router