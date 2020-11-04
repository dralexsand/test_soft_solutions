import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home'
import Posts from '../views/Posts'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/posts',
            name: 'posts',
            component: Posts,
        },
        {
            path: '/about',
            name: 'about',
            component: () => import('../views/About'),
        },
    ],
    linkActiveClass: 'active'
})

export default router;
