<template>
    <div>
        <p class="font-bold text-lg py-5">
            Products Information
            <button @click="newProduct" class="bg-transparent float-right hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded">
                Add a new product
            </button>
        </p>
        <table class="table-fixed my-2 bg-white shadow-sm">
            <thead>
                <tr>
                <th class="border w-1/12 px-4 py-2">ID</th>
                <th class="border w-4/12 px-4 py-2">Name</th>
                <th class="border w-1/12 px-4 py-2">Status</th>
                <th class="border w-2/12 px-4 py-2">ISBN</th>
                <th class="border w-2/12 px-4 py-2">Author</th>
                <th class="border w-1/12 px-4 py-2">Original Price</th>
                <th class="border w-1/12 px-4 py-2">Sale Price</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="product in products" v-bind:key="product.id">
                <td class="border px-4 py-2 text-center">{{product.id}}</td>
                <td class="border px-4 py-2">{{product.name}}</td>
                <td class="border px-4 py-2 text-center">{{product.check_out_status}}</td>
                <td class="border px-4 py-2 text-center">{{product.isbn}}</td>
                <td class="border px-4 py-2 text-right">{{product.author}}</td>
                <td class="border px-4 py-2 text-right">{{product.price}}</td>
                <td class="border px-4 py-2"></td>
                </tr>
            </tbody>
        </table>

        <modal @close="endEditing" :product="editingItem" v-show="editingItem != null"></modal>
        <modal @close="addProduct"  :product="addingProduct" v-show="addingProduct != null"></modal>
        <br>
        <!-- <button class="btn btn-primary" @click="newProduct">Add New Product</button> -->
    </div>
</template>

<script>
import Modal from './ProductModal'

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