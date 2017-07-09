import Vue from 'vue'
import VueResource from 'vue-resource'
import VueRouter from 'vue-router'
import App from './components/app.vue'
import Cars from './components/app/cars.vue'
import NotFound from './components/app/404.vue'


// register plugins
Vue.use(VueResource)
Vue.use(VueRouter)

// create & configure router
const router = new VueRouter()

router.map({
    '/cars': {
        name: 'cars',
        component: Cars
    },
    '/404': {
        name: '404',
        component: NotFound
    }
})

router.redirect({
    '*': {name: '404'}
})

//default redirect to `/cars`
// router.redirect({
//     '/': '/cars'
// })

// start app
router.start(App, '#app')
