import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        name: 'home',
        component: require('./components/Car/List.vue'),
    },
    {
        path: '/car/:make',
        name: 'make',
        component: require('./components/Car/Make.vue')
    },
    {
        path: '/car/:make/:model',
        name: 'model',
        component: require('./components/Car/Model.vue')
    },
    {
        path: '/add',
        name: 'add',
        component: require('./components/Car/Form.vue')
    }

];

export default new VueRouter({
    routes
});