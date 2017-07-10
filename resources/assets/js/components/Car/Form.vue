<template>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Форма добавления</h1>
                </div>
                <div class="panel-body">
                    <form v-on:submit.prevent="createCar" method="post">
                        <div class="form-group">
                            <label for="make">make</label>
                            <input type="text" class="form-control" v-model="form.make" id="make" placeholder="Make">
                        </div>
                        <div class="form-group">
                            <label for="model">model</label>
                            <input type="text" class="form-control"  v-model="form.model" id="model" placeholder="Model">
                        </div>
                        <div class="form-group">
                            <label for="year">year</label>
                            <input type="text" class="form-control"  v-model="form.year" id="year" placeholder="1990">
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="text" class="form-control"  v-model="form.price" id="price" placeholder="100000 т.р.">
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    import axios from 'axios';

    export default {
        data () {
            return {
                form: {
                    make: '',
                    model: '',
                    year: '',
                    price: ''
                },
            }
        },
        created (){
            //this.createCar()
        },
        methods: {
            createCar() {
                var self = this
                return axios.post('/api/car/add', self.form)
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