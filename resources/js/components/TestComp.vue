<template>
<div :class="['device', 'elevation-8']">
  <div>
      <button @click="nav1 = !nav1" >Click me</button>
    <vc-nav-drawer v-model="nav1" :temporary="true" :dark="false">
      <vc-collapsible name="collapsible-1" color="primary" :multiple="false">
        <vc-collapsible-item v-for="j in 5" :open="j === 2" :key="j" :label="`Item ${j}`" has-vc-list>
          <vc-list>
            <vc-list-item v-for="i in 5" :key="i" :avatar="`/static/images/avatar-0${i}.png`">
              <vc-list-item-primary-text>User {{ i }}</vc-list-item-primary-text>
              <vc-list-item-secondary-text>something</vc-list-item-secondary-text>
            </vc-list-item>
          </vc-list>
        </vc-collapsible-item>
      </vc-collapsible>
    </vc-nav-drawer>
  </div>
</div>

</template>

<script>
    export default {
     data() {
         return {
            nav1: false
         }
        },

    }
</script>

<style lang="scss" scoped>

</style>
