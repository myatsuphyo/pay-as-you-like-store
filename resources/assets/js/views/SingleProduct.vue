<template>
    <div class="md:flex items-center md:px-24">
        <div class="w-full">
            <img class="w-auto h-auto m-auto md:m-2 shadow-2xl hover:shadow-5xl" :src="product.image" :alt="product.name">
        </div>
        <!-- <div class="w-1/2 border-gray-300 rounded">
            <p class="text-3xl text-bold" v-html="product.name"></p>
            <p class="text-sm text-gray-700 py-4">{{product.description}}</p>
            <p>
                <span class="small-text text-muted float-left">$ {{product.price}}</span>
                <span class="small-text float-right">Available Quantity: {{product.units}}</span>
            </p>
            <br>
            <hr>
            <router-link :to="{ path: '/checkout?pid='+product.id }" class="col-md-4 btn btn-sm btn-primary float-right">Buy Now</router-link>
        </div> -->
        <div class="md:max-w-1/2 m-10 md:m-auto">
            <div class="md:px-10 md:bg-white py-4 rounded overflow-hidden md:shadow-lg">
                <div class="font-bold text-xl mb-2">{{product.name}}</div>
                <p class="text-gray-700 text-base">
                    {{product.description}}
                </p>
                <div class="py-4">
                    <span class="inline-block bg-blue-200 hover:bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-gray-100">#tech</span>
                    <span class="inline-block bg-blue-200 hover:bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-gray-100">#future</span>
                    <span class="inline-block bg-blue-200 hover:bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-gray-100">#knowledge</span>
                    <span class="inline-block bg-blue-200 hover:bg-blue-500 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-gray-100 md:float-right">#knowledge</span>
                </div>
            </div>
            <div class="flex-wrap pt-8">
                <div class="text-gray-700 text-xl">
                    My favourite lines

                </div>
                <p class="text-gray-700 text-base py-2">
                    {{product.description}}
                </p>
                <p class="text-gray-700 text-base py-2">
                    {{product.description}}
                </p>
            </div>
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
    }, 
    created() {
        let url = `https://www.goodreads.com/book/isbn/0441172717?callback=myCallback&format=json&user_id=48008136`
        axios.get(url).then(response => console.log(response.data))  
    }
}
</script>