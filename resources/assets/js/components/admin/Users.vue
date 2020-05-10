<template>
    <div>
        <p class="font-bold text-lg py-5">
            Users Information
        </p>
        <table class="table-fixed">
            <thead>
                <tr>
                <th class="border w-1/3 px-4 py-2">ID</th>
                <th class="border w-1/3 px-4 py-2">Name</th>
                <th class="border w-1/3 px-4 py-2">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" v-bind:key="user.id">
                <td class="border px-4 py-2">{{user.id}}</td>
                <td class="border px-4 py-2">{{user.name}}</td>
                <td class="border px-4 py-2">{{user.email}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users : []
        }
    },
    beforeMount() {
        axios.get('/api/users/').then(response => this.users = response.data)
    }
}
</script>