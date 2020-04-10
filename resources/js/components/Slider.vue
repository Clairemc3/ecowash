<template>
    <div class="slider">
        <div class="slide">
            <div class="slider__image">
                <img :src="slides[currentIndex].imageSrc" style="width:100%">
            </div>

            <div class="slider__text"> {{slides[currentIndex].text }}</div>
        </div>
    </div>

</template>

<script>
    export default {

        data() {
            return {
                slides: [
                    { 'imageSrc' : "/images/launderette-slider-1.jpg",'text' : "this is some text ghgrh gr gj gn gjrtgn jrtgbjrtgjrgbrj jgjkr gjrg jtrbghjtrbghjrtbghrjtbgjrthg jrgjhrtbgtrjhbgrhjbgrhjgbrhtjgbhrt bgren bghjrebghjre bghjregbehgbehr " },
                    { 'imageSrc' : "/images/launderette-slider-1.jpg",'text' : "this is some othet text" },
                ],
                timer: null,
                currentIndex: 0
            };
        },

    }
</script>

<style lang="scss" scoped>


</style>
