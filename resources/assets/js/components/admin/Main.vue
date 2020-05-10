<template>
    <div class="px-10">
        <p class="font-bold text-lg py-5">Total Store Information</p>
        <div class="font-bold hover:text-blue-500 my-2">
            <a href='/admin/orders'>Orders ({{orders.length}})</a>
        </div>
        <div class="font-bold hover:text-blue-500 my-2">
            <a href='/admin/products'>Products ({{products.length}})</a>
        </div>
        <div class="font-bold hover:text-blue-500 my-2">
            <a href='/admin/users'>Users ({{users.length}})</a>
        </div>
    </div>
</template>

<script>
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