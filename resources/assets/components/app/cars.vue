<template>
    <div class="four wide column">
        <!--<menu :tasks-count="tasksCount" :models="cards"></menu>-->
    </div>

    <div class="twelve wide column">
        <router-view></router-view>
    </div>
</template>

<script type="text/babel">
    //import Menu from './cards/menu'
    import carService from '../../services/cars'

    export default {
        data() {
            return {
                cards: {}
            }
        },
        route: {
            data() {
                return {
                    cards: carService.query()
                }
            },
            waitForData: true
        }
    }
</script>