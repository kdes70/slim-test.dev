<template>
    <div>
        <h1>Выбирете модель автомобиля</h1>
        <div class="row">
            <h3>
                <router-link :to="{name: 'home'}"
                             tag="a"
                             class="btn btn-default glyphicon glyphicon-chevron-left"
                             href="/" role="button">
                </router-link>

                <router-link :to="{ name: 'add'}" tag="a">Добавить автомобиль</router-link>
            </h3>
            <h3>

            </h3>
            <ul class="select_car">
                <li v-for="car in car_model">
                    <router-link :to="{ name: 'model', params:{ make: $route.params.make,  model: car.model}}">
                        {{car.model}}
                    </router-link>
                </li>
            </ul>
        </div>

    </div>
</template>
<script>

    import axios from 'axios';

    export default {
        data () {
            return {
                car_model: [],
            }
        },
        created (){
            this.findCar()
        },
        methods: {
            findCar() {
                var self = this
                return axios.get('/api/car/' + self.$route.params.make,)
                    .then(function (response) {
                        console.log(response)
                        self.car_model = response.data
                    })
                    .catch(function (error) {
                        self.errors = error
                    })
            }
        }
    }
</script>