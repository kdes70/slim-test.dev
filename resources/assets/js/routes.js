import VueRouter from 'vue-router';

let routes = [
    {
        path: '/',
        component: require('./components/Cars.vue'),
    },
    {
        path: '/car/:model',
        name: 'model',
        component: require('./components/Car.vue')
    },

];

export default new VueRouter({
    routes
});