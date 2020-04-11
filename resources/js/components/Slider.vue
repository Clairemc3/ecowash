<template>
    <div class="slider">
        <transition-group name='fade' tag='div'>
            <div v-for="number in [currentIndex]" :key='number' class="slide">
                <div class="slider__image">
                    <img :src="currentSlide.imageSrc" style="width:100%">
                </div>
                <div class="slider__text">{{ currentSlide.text }}</div>
            </div>
        </transition-group>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                slides: [
                    { 'imageSrc' : "/images/launderette-slider-1.jpg",'text' : "Slide 1 " },
                    { 'imageSrc' : "/images/launderette-slider-1.jpg",'text' : "this is some othet text" },
                ],
                timer: null,
                currentIndex: 0
            };
        },

        mounted() {
            this.startRotation();
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
    transition: all 2s ease;
    overflow: hidden;
    visibility: visible;
    opacity: 1;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
    visibility: hidden;
}

</style>
