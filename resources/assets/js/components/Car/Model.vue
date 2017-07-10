<template>
    <div>
        <h1>{{$route.params.make }} <small>{{ $route.params.model }}</small></h1>
        <div class="row">
            <h3>
                <router-link :to="{name: 'make', params: {make:$route.params.make }}"
                             tag="a"
                             class="btn btn-default glyphicon glyphicon-chevron-left"
                             href="/" role="button">
                </router-link>

                <router-link :to="{ name: 'add'}" tag="a">Добавить автомобиль</router-link>
            </h3>
            <table class="table">
                <caption> {{$route.params.make }} - {{ $route.params.model }}</caption>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Марка</th>
                    <th>Модель</th>
                    <th>Год выпуска</th>
                    <th>Цена</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="car in modelList">
                    <th scope="row">1</th>
                    <td>{{car.make}}</td>
                    <td>{{car.model}}</td>
                    <td>{{car.year}}</td>
                    <td>{{car.price}}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>
<script>

    import axios from 'axios';

    export default {
        data () {
            return {
                modelList: []
            }
        },
        created (){
            this.findModelList()
        },
        methods: {
            findModelList() {
                var self = this
                return axios.get('/api/car/' + self.$route.params.make + '/' + self.$route.params.model)
                    .then(function (response) {
                        self.modelList = response.data
                    })
                    .catch(function (error) {
                        self.errors = error
                    })
            }
        }
    }
</script>