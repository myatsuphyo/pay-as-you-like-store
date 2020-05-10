<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header text-lg font-bold">
                    <span v-if="data.name == null">Add a new proudct</span>
                    <span v-else>Edit a new proudct</span> {{data.success}}
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Name
                            </label>
                            <input v-model="data.name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                A brief description
                            </label>
                            <input v-model="data.description" class="shadow appearance-none border rounded w-full h-auto overflow-y-auto py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Image URL
                            </label>
                            <input v-model="data.image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                        </div>
                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Author
                                </label>
                                <input v-model="data.author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                            </div>
                            <div class="w-1/2 ml-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    ISBN
                                </label>
                                <input v-model="data.isbn" class="text-left shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                            </div>
                        </div>
                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Price
                                </label>
                                <input v-model="data.price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                            </div>
                            <div class="w-1/2 ml-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                    Units
                                </label>
                                <input v-model="data.units" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                            </div>
                        </div>
                    </slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer">
                        <button @click="submit" class="bg-blue-500 shadow-outline text-gray-100 float-right font-semibold hover:shadow-lg hover:bg-blue-400 hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded-full">
                            +
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product'],
    data() {
        return {
            success: true
        }
    },
    computed: {
        data: function() {
            if (this.product != null) {
                return this.product
            }
            return {
                name: "",
                description: "",
                image:"",
                author: "",
                isbn: "",
                price: "",
                unit: "", 
            }
        }
    },
    methods: {
        submit(event) {
            axios.post("/api/add/product", this.data).then(response => {
                this.product.image = response.data
                this.$emit('close', this.product)
            })
            // console.log(this.data)
        }
    }
}
</script>