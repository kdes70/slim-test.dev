<template>
    <div>
        <h1>Car page {{ $route.params.model }}</h1>

        <div class="row">
            <ul>
                <li v-for="item in car">
                   {{ item.model }}
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
                car: [],
            }
        },
        created (){
            this.findCar()
        },
        methods: {
            findCar() {
                var self = this
                return axios.get('/api/car/' + self.$route.params.model,)
                    .then(function (response) {
                        console.log(response)
                        self.car = response.data
                    })
                    .catch(function (error) {
                        self.errors = error
                    })
            }
        }
    }
</script>