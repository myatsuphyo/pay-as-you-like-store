<template>
    <div class="px-10">
        <button @click="newProduct" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">
            Add a new product
        </button>
        <table class="table-fixed my-4">
            <thead>
                <tr>
                <th class="w-2/6 border px-4 py-2">Name</th>
                <th class="w-1/6 border px-4 py-2">ISBN</th>
                <th class="w-1/6 border px-4 py-2">Status</th>
                <th class="w-1/6 border px-4 py-2">Original Price</th>
                <th class="w-1/6 border px-4 py-2">Sale Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" v-bind:key="product.id">
                <td class="border px-4 py-2">{{product.name}}</td>
                <td class="border px-4 py-2">{{product.isbn}}</td>
                <td class="border px-4 py-2 text-right">
                    <span v-if="product.check_out_status == 0">In Stock</span>
                    <span v-else>Sold Out</span>
                </td>
                <td class="border px-4 py-2 text-right">{{product.price}}</td>
                <td class="border px-4 py-2 text-right"></td>
                </tr>
            </tbody>
        </table>
        <modal @close="endEditing" :product="editingItem" v-show="editingItem != null"></modal>
        <modal @close="addProduct"  :product="addingProduct" v-show="addingProduct != null"></modal>
        <br>
    </div>
</template>

<script>
import Modal from './ProductModal'
import axios from 'axios';
export default {
    data() {
        return {
            products: [],
            editingItem: null,
            addingProduct: null
        }
    },
    components: {Modal},
    beforeMount() {
        axios.get('/api/products/').then(response => this.products = response.data)
    },
    methods: {
        newProduct() {
            this.addingProduct = {
                name: null,
                units: null,
                price: null,
                image: null,
                description: null,
            }
        },
        endEditing(product) {
            this.editingItem = null

            let index = this.products.indexOf(product)
            let name = product.name
            let units = product.units
            let price = product.price
            let description = product.description

            axios.put(`/api/products/${product.id}`, {name, units, price, description})
                    .then(response => this.products[index] = product)
        },
        addProduct(product) {
            this.addingProduct = null

            let name = product.name
            let units = product.units
            let price = product.price
            let description = product.description
            let image = product.image 

            axios.post("/api/products/", {name, units, price, description, image})
                    .then(response => this.products.push(product))
        }
    }
}
</script>