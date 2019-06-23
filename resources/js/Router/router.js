import Vue from 'vue'
import VueRouter from 'vue-router'

import Homepage from '../components/Homepage'
import Dive from '../components/Dive/dives'
import CreateDive from '../components/Dive/CreateDive'
import Profile from '../components/User/Profile'
import Signin from '../components/User/Signin'
import Signup from '../components/User/Signup'

Vue.use(VueRouter)



const routes = [
    { path: '/', component: Homepage },
    { path: '/dives', component: Dive },
    { path: '/dive/new', component: CreateDive },
    { path: '/profile', component: Profile },
    { path: '/signin', component: Signin },
    { path: '/signup', component: Signup },
  ]

const router = new VueRouter({
    routes,
    mode: 'history'
})

export default router