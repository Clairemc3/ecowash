<template>
    <div>
        <v-carousel hide-delimiters cycle height="100%">
            <v-carousel-item v-for="(item,i) in items" :key="i"
                :src="item.src"
                 reverse-transition="fade-transition"
                transition="fade-transition">
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
    .v-window {
        padding: 0.75em;
    }
    .v-window__next {
        right: 0;
    }
</style>
