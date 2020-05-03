<template>
    <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input v-model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Email
                    </label>
                    <input v-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input v-model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                    <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Confirm Password
                    </label>
                    <input v-model="password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" type="password" placeholder="******************">
                    <!-- <p class="text-red-500 text-xs italic">Please choose a password.</p> -->
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"  @click="handleSubmit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                * Please, feel free to use an easy-to-remember password. e.g-"password"
            </p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props : ['nextUrl'],
    data(){
        return {
            name : "",
            email : "",
            password : "",
            password_confirmation : ""
        }
    },
    methods : {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password !== this.password_confirmation || this.password.length <= 0) {
                this.password = ""
                this.password_confirmation = ""
                return alert('Passwords do not match')
            }
            let name = this.name
            let email = this.email
            let password = this.password
            let c_password = this.password_confirmation
            axios.post('api/register', {name, email, password, c_password}).then(response => {
                let data = response.data
                localStorage.setItem('bigStore.user', JSON.stringify(data.user))
                localStorage.setItem('bigStore.jwt', data.token)
                if (localStorage.getItem('bigStore.jwt') != null) {
                    this.$emit('loggedIn')
                    let nextUrl = this.$route.params.nextUrl
                    this.$router.push((nextUrl != null ? nextUrl : '/'))
                }
            })
        }
    }
}
</script>