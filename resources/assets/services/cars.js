import Vue from 'vue'
import Promise from 'promise'

export default {
    query() {
        return new Promise((resolve, reject) => {
            Vue.http.get('api/index.php/cars').then((response) => {
                resolve(response.json())
            }, error => {
                reject(error)
            })
        })
    },
}