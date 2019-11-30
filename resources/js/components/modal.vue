<template>
    <div>
        <!-- trigger -->
        <div @click="isOpen = !isOpen">
            <slot name="trigger"></slot>
        </div>

         <!-- modal -->
        <transition name="fade">
            <div v-if="isOpen">
                <div class="overlay" @click.self="isOpen = false;">
                    <div class="modal">
                        <h1>Modal heading</h1>
                        <p>This my first modal using vue.js</p>
                    </div>
                </div>
            </div>
        </transition>
   </div>
</template>

<script>
    export default {
        data() {
        return {isOpen: false} 
        },
    }
</script>


<style scoped>
  .modal {
    width: 500px;
    margin: 0px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px 3px;
  }

  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background: #00000094;
    z-index: 999;
  }


  .fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
</style>