<template>
    <div>
        <h1>Cars page</h1>

        <div class="row">
            <ul>
                <li v-for="car in cars">
                    <!--<router-link :to="{ name: 'model', params: { model: car.make.toLowerCase().trim() }}" tag="a">{{ car.make }}</router-link>-->
                    <router-link :to="{ name: 'model', params: { model: car.make.trim() }}" tag="a">{{ car.make }}</router-link>
                </li>
            </ul>
        </div>s
    </div>
</template>
<script>

    import axios from 'axios';

    export default {
        data () {
            return {
                cars: [],
                errors: [],
                car_link: '/api/car/model'
            }
        },
        created (){
            this.findCarsMake()
        },
        methods: {
            findCarsMake() {
                var self = this
                return axios.get('/api/cars')
                    .then(function (response) {
                        console.log(response)
                        self.cars = response.data
                    })
                    .catch(function (error) {
                        self.errors = error
                    })
            }
        },
        routes:{

        }
    }
</script>