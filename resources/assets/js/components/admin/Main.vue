<template>
    <div class="row">
        <div class="font-bold">
            <a href='/admin/orders'>Orders ({{orders.length}})</a>
        </div>
        <div class="font-bold">
            <a href='/admin/products'>Products ({{products.length}})</a>
        </div>
        <div class="font-bold">
            <a href='/admin/users'>Users ({{users.length}})</a>
        </div>
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