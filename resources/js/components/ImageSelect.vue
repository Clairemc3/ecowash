<template>
        <modal>
            <template v-slot:trigger>
                 <img class="w-full sm:w-1/2 md:w-1/3 m-3" v-if="selectedImage" :src="selectedImage" >
                 <img class="w-full sm:w-1/2 md:w-1/3 m-3" v-else :src="defaultImage" >
                 <input v-if="selectedImage" name="slider_url" type="hidden" :value="selectedImage">
            </template>
            <h1 class="font-bold">Modal header</h1>
                <div class="flex flex-wrap border-none overflow-y-auto max-h-350">
                    <div class="w-full sm:w-1/2 md:w-1/3 m-3" v-for="image in imageUrls" :key="image" :class="{ active: image === activeImage}">
                        <img @click="activateImage(image)" :src="imageUrl(image)">
                    </div>
                </div>
            <p>Modal text</p>
            <p>jfnrjghdu</p>

            <template v-slot:footer>
                <div class="button-group">
                    <button @click.prevent=selectImage class="btn btn-teal">Select</button>
                    <button @click.prevent=$modal.close() class= "btn btn-white">Cancel</button>
                </div>
            </template>
        </modal>
</template>

<script>
    export default {

        data() {
            return {
                imageUrls: this.images,
                activeImage: null,
                selectedImage: null,
                defaultImage: '/storage/slider-images/slider-default.jpg'
            }
        },

        props: {
            images: Array,
            required: true
        },

        methods: {
            imageUrl(image) {
                return '/storage/' + image;
            },

            activateImage(image) {
                this.activeImage = image;
            },

            selectImage() {
                this.selectedImage = this.activeImage;
                this.$modal.close();
            }
        },
    }
</script>

<style lang="scss" scoped>

.active  {
    outline: 3px solid #2F67CA;
}

</style>
