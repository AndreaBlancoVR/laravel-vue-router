import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import Posts from '../pages/PostsIndex.vue'
import Contact from '../pages/Contact.vue'
import Post from '../pages/Posts.show.vue'
import NotFound from '../pages/404.vue'

const routes = [
    {
        path: '/posts',
        name: 'posts.index',
        component: Posts
    },
    {
        path: '/posts/:slug',
        name: 'posts.show',
        component: Post
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact
    },
    {
        path:'/*',
        component: NotFound
    },
]

// creare istanza
const router = new VueRouter({
    mode: 'history',
    routes: routes
});

export default router
