<template>
    <div class="px-10">
        <div class="text-right">
            <p class="text-5xl text-blue-500 text-right font-bold m-2">Pay as you like</p> 
            <p class="text-xl text-right text-blue-400 m-2">and take as many as you need.</p>
            <p class="text-xl text-right text-gray-700 m-2">Let's recycle and reuse!</p>
        </div>
        <div class="flex flex-wrap-reverse">
            <div v-for="product in products" v-bind:key="product.id" class="w-1/6 p-2">
                <router-link :to="{ path: '/products/'+product.id}">
                    <img class="w-auto h-auto m-auto md:m-2 shadow-2xl hover:shadow-5xl" :src="product.image" :alt="product.name">
                    <p class="text-sm text-gray-900 text-center">{{product.name}}</p>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products : []
            }
        },
        mounted(){
            axios.get("api/products/").then(response => this.products = response.data)      
        }
    }
</script>