<template>
    <div>
        <nav class="flex items-center justify-between flex-wrap bg-blue-500 p-6">
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-blue-200 border-blue-400 hover:text-white hover:border-white">
                <!-- <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg> -->
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm hidden  md:block lg:flex-grow">
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                    </a>
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                    </a>
                    <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-blue-200 hover:text-white mr-4">
                        <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>
                    </a>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <router-view @loggedIn="change"></router-view>
        </main>
        <!-- <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">Login</router-link> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            user_type: 0,
            isLoggedIn: localStorage.getItem('bigStore.jwt') != null
        }
    },
    mounted() {
        this.setDefaults()
    },
    methods : {
        setDefaults() {
            if (this.isLoggedIn) {
                let user = JSON.parse(localStorage.getItem('bigStore.user'))
                this.name = user.name
                this.user_type = user.is_admin
            }
        },
        change() {
            this.isLoggedIn = localStorage.getItem('bigStore.jwt') != null
            this.setDefaults()
        },
        logout(){
            localStorage.removeItem('bigStore.jwt')
            localStorage.removeItem('bigStore.user')
            this.change()
            this.$router.push('/')
        }
    }
}
</script>