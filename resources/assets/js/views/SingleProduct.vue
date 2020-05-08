<template>
    <div class="md:flex items-center md:px-24">
        <div class="w-full">
            <img class="w-auto h-auto m-auto md:m-2 shadow-2xl hover:shadow-5xl" :src="product.image" :alt="product.name">
        </div>
        <div class="md:max-w-1/2 m-10 md:m-auto">
            <div class="md:px-10 md:bg-white py-4 rounded overflow-hidden md:shadow-lg">
                <div class="font-bold text-xl mb-2">{{product.name}}</div>
                <p class="text-gray-700 text-base">
                    {{product.description}}
                </p>
                <div class="py-4">
                    <span v-for="tag in product.tags" v-bind:key="tag.tag_id" class="inline-block bg-blue-200 hover:bg-blue-500 rounded-full px-2 py-1 mx-1  text-sm font-semibold text-gray-700 hover:text-gray-100">#{{tag.text}}</span>
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
        
    }
}
</script>