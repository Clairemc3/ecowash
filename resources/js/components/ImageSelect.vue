<template>
        <modal class="image-select">
            <template v-slot:trigger>
                 <img class="w-1/2 sm:w-1/3 md:w-1/4 m-3" v-if="selectedImage" :src="selectedImage" >
                 <img class="w-1/2 sm:w-1/3 md:w-1/4 m-3" v-else :src="defaultImage" >
                 <input v-if="selectedImage" name="image_source" type="hidden" :value="selectedImage">
            </template>

             <template v-slot:header>
                <h1 class="font-bold">Select an image for the slider</h1>
            </template>

            <!-- Main slot content -->
            <p v-if="apiError">There was a problem fetching the images</p>
                <div class="flex flex-wrap border-none modal-content">
                    <div class="w-full sm:w-1/2 md:w-1/3 m-3" v-for="image in imageUrls" :key="image" :class="{ active: image === activeImage}">
                        <img @click="activateImage(image)" :src="imageUrl(image)">
                    </div>
                </div>
            <!-- End of main slot content -->

            <template v-slot:footer>
                <div class="button-group">
                    <button @click.prevent=selectImage class="btn btn-teal">Select</button>
                    <button @click.prevent=$modal.close() class= "btn btn-white">Cancel</button>
                </div>
            </template>
        </modal>
</template>

<script>
import Modal from '../plugins/modal/ModalPlugin';
    export default {

        data() {
            return {
                imageUrls: null,
                activeImage: null,
                selectedImage: null,
                defaultImage: '/storage/image-placeholder.jpg',
                apiError: false,
            }
        },

        props: {
            images: {
                type: Array,
                required: false
            },
            imageApiUrl: {
                type: String,
                required: false
            },
            existingImage: {
                type: String,
                required: false
            },
        },

        methods: {
            imageUrl(image) {
                return image;
            },

            activateImage(image) {
                this.activeImage = image;
            },

            selectImage() {
                this.selectedImage = this.activeImage;
                this.$modal.close();
            },

            loadImages() {
                // If the user has provide an array of images, we can use these
                if (this.images) {
                    return this.images;
                }
                // If we have been provided with a url to fetch the images with - get these
                if (this.imageApiUrl) {
                    this.$http.get(this.imageApiUrl)
                    .then((result) => {
                        this.imageUrls = result.data
                    }).catch((error) => {
                        this.apiError = true;
                    });
                }
            }
        },

        mounted(){
            // Set the selected image if we have been passed one
            this.selectedImage = this.existingImage;
            Modal.events.$on('open', event => {
                this.imageUrls = this.loadImages();
            });
        },


    }
</script>

<style lang="scss" scoped>

.active  {
    outline: 3px solid #2F67CA;
}
.modal {
    max-height: calc(100vh - 50px);
}

</style>
