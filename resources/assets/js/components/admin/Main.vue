<template>
    <div class="px-10">
        <p class="font-bold text-xl py-6">Total Store Information</p>
        <p class="font-bold hover:text-blue-500 py-2">
            <a href='/admin/orders'>Orders ({{orders.length}})</a>
        </p>
        <p class="font-bold hover:text-blue-500 py-2">
            <a href='/admin/products'>Products ({{products.length}})</a>
        </p>
        <p class="font-bold hover:text-blue-500 py-2">
            <a href='/admin/users'>Users ({{users.length}})</a>
        </p>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            user : null,
            orders : [],
            products : [],
            users : []
        }
    },
    mounted() {
        axios.get('/api/users/').then(response => this.users = response.data)
        axios.get('/api/products/').then(response => this.products = response.data)
        axios.get('/api/orders/').then(response => this.orders = response.data)
    }
}
</script>