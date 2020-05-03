<template>
    <div class="flex items-center p-24">
        <div class="w-1/2">
            <img class="w-auto h-auto" :src="product.image" :alt="product.name">
        </div>
        <div class="w-1/2">
            <p class="text-3xl text-bold" v-html="product.name"></p>
            <p class="text-sm text-gray-700 py-4">{{product.description}}</p>
            <p>
                <span class="small-text text-muted float-left">$ {{product.price}}</span>
                <span class="small-text float-right">Available Quantity: {{product.units}}</span>
            </p>
            <br>
            <hr>
            <router-link :to="{ path: '/checkout?pid='+product.id }" class="col-md-4 btn btn-sm btn-primary float-right">Buy Now</router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data(){
        return {
            product : []
        }
    },
    beforeMount(){
        let url = `/api/products/${this.$route.params.id}`
        axios.get(url).then(response => this.product = response.data)      
    }
}
</script>