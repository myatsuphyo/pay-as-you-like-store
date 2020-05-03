<template>
    <div class="flex items-center justify-center mt-10">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input v-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input v-model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
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
                &copy;2020 Acme Corp. All rights reserved.
            </p>
            </div>
                </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                email: "",
                password: ""
            }
        },
        methods: {
            handleSubmit(e) {
                console.log('in handleSubmit')
                console.log(this.email)
                console.log(this.password)
                e.preventDefault()
                if (this.password.length > 0) {
                    let email = this.email
                    let password = this.password

                    axios.post('api/login', {email, password}).then(response => {
                        let user = response.data.user
                        let is_admin = user.is_admin

                        localStorage.setItem('bigStore.user', JSON.stringify(user))
                        localStorage.setItem('bigStore.jwt', response.data.token)

                        if (localStorage.getItem('bigStore.jwt') != null) {
                            this.$emit('loggedIn')
                            if (this.$route.params.nextUrl != null) {
                                this.$router.push(this.$route.params.nextUrl)
                            } else {
                                this.$router.push((is_admin == 1 ? 'admin' : 'dashboard'))
                            }
                        }
                    });
                }
            }
        }
    }
</script>