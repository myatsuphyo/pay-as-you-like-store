<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header" v-html="data.name"></slot>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        Name: <input type="text" v-model="data.name">
                        Author: <input type="text" v-model="data.author">
                        ISBN: <input type="text" v-model="data.isbn">
                        Price: <input type="text" v-model="data.price">
                        <textarea v-model="data.description" placeholder="description"></textarea>
                        <span >
                            <img :src="data.image" v-show="data.image != null">
                            <input type="file" id="file" @change="attachFile">
                        </span>
                    </slot>
                </div>
                <div class="modal-footer">
                    <slot name="footer">
                        <button class="modal-default-button" @click="uploadFile">
                            Finish
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
            attachment: null
        }
    },
    computed: {
        data: function() {
            if (this.product != null) {
                return this.product
            }
            return {
                name: "",
                units: "",
                price: "",
                description: "",
                image: false
            }
        }
    },
    methods: {
        attachFile(event) {
            this.attachment = event.target.files[0];
        },
        uploadFile(event) {
            if (this.attachment != null) {
                var formData = new FormData();
                formData.append("image", this.attachment)
                let headers = {'Content-Type': 'multipart/form-data'}
                axios.post("/api/upload-file", formData, {headers}).then(response => {
                    this.product.image = response.data
                    this.$emit('close', this.product)
                })
            } else {
                this.$emit('close', this.product)
            }
        }
    }
}
</script>