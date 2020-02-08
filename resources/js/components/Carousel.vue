<template>
    <div>
        <v-carousel hide-delimiters height="100%">
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
    data () {
      return {
        items: [
          {
            src: '/images/launderette-slider-1.jpg',
            text: 'Over 10 dryers available blah blah I am writing loads here because I am excesign in what I write, oh yeah, lallslsls grjhgbrjhgb jhgbrhjgbrhjgb jhrghjtrh'
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/sky.jpg',
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/bird.jpg',
          },
          {
            src: 'https://cdn.vuetifyjs.com/images/carousel/planet.jpg',
          },
        ],
      }
    },
  }
</script>

<style lang="scss" scoped>


.v-window {
    padding: 0.75em;
}


// .v-window__prev {
//     left: 0;
// }

// .v-window__next {
//     right: 0;
// }


</style>
