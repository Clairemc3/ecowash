<template>
    <div class="slider">
        <transition-group name='fade' tag='div'>
            <div v-for="number in [currentIndex]" :key='number' class="slide">
                <div class="slider__image">
                    <img :src="currentSlide.image_source" style="width:100%">
                </div>
                <div class='slider_text_group'>
                    <div class="slider__text">{{ currentSlide.text }}</div>
                </div>
            </div>
        </transition-group>
    </div>
</template>

<script>
    export default {


        props: {
            slides: {
                type: Array,
                required: true
            },
        },

        data() {
            return {
                timer: null,
                currentIndex: 0
            };
        },

        mounted() {
            if (this.slides.length > 1) {
                this.startRotation();
            }
        },

        computed: {
            currentSlide() {
               return  this.slides[Math.abs(this.currentIndex) % this.slides.length];
            }
        },

        methods: {
            startRotation() {
                this.timer = setInterval(this.next, 3000);
            },

            stopRotation() {
                clearTimeout(this.timer);
                this.timer = null;
            },

            next() {
                this.currentIndex += 1
            },

            previous() {
                this.currentIndex -= 1
            },

        }

    }
</script>

<style>

.fade-enter-active, .fade-leave-active {
    transition: opacity 2s cubic-bezier(0,1,1,1) , visibility 2s cubic-bezier(0,1,1,1);
    overflow: hidden;
    visibility: visible;
    opacity: 1;
}

.fade-enter, .fade-leave-to {
    opacity: 0;
    visibility: hidden;
    position: absolute;
}

.slider_text_group {
    position: relative;
}



</style>
