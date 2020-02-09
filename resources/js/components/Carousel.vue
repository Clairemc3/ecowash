<template>
    <div class="slider">
        <v-carousel cycle height="600" hide-delimiters show-arrows-on-hover>
            <v-carousel-item v-for="(item, i) in items" :key="i" :src="item.src">
                <div v-if="item.text">
                        <div class="slider__text">{{item.text}}</div>
                </div>
            </v-carousel-item>
        </v-carousel>
    </div>
</template>

<script>
export default {
    props: {
        items: {default: []},
    },
  }
</script>

<style>

    .slider {
        padding-bottom: 0.75em;
    }
    .v-window {
        padding: 0.75em;
    }
    .v-window__next {
        right: 0;
    }
</style>
