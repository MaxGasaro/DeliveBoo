import Vue  from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from './pages/Home';
import Research from './pages/Research';
import Contact from './pages/Contact';
import NotFound from './pages/NotFound';
// import { divide } from "lodash";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/research',
            name: 'research',
            component: Research
        },
        {
            path: '/contacts',
            name: 'contact',
            component: Contact
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        }
    ],    
});

export default router
