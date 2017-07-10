<template>
    <div>
        <h1>Выбирете марку автомобиля</h1>
        <div class="row">
            <h3>
                <router-link :to="{ name: 'add'}" tag="a">Добавить автомобиль</router-link>
            </h3>
            <ul class="select_car">
                <li v-for="car in cars">
                    <router-link :to="{ name: 'make', params: { make: car.make.trim().toLowerCase() }}" tag="a">
                        {{ car.make }}
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
                cars: [],
                errors: [],
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
                        self.cars = response.data
                    })
                    .catch(function (error) {
                        self.errors = error
                    })
            }
        },
        routes: {}
    }
</script>

<style>
    .select_car {
        list-style: none;
        height: 80px;
        border: 1px solid #b2b3b6;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        padding: 10px;
    }

    .select_car li {
        page-break-inside: avoid;
        break-inside: avoid;
    }
</style>