<template>
    <div>
        <!-- Trigger -->
        <div @click="isOpen = !isOpen">
            <slot name="trigger"></slot>
        </div>

        <!-- Modal -->
         <div v-show="isOpen" class="overlay text-left">
            <a @click.prevent="isOpen = !isOpen" href="#" class="cancel"></a>
            <div class="modal">
                <slot></slot>
                <footer>
                    <slot name="footer"></slot>
                </footer>
                <a @click.prevent="isOpen = !isOpen" href="#" class="close text-3xl">&times</a>
            </div>
        </div>
    </div>
</template>

 <slot></slot>
<script>

import Modal from './ModalPlugin';
    export default {

       data() {
         return {
            isOpen: false
         }
        },

        mounted() {
            Modal.events.$on('close', params => {
                this.isOpen = false;
            });
            Modal.events.$on('open', params => {
                this.isOpen = true;
            });

        },

        beforeMount() {
            if (this.openOnLoad) {
                this.isOpen = true;
            }
        },

        props: ['name', 'openOnLoad'],

    }
</script>

<style type="text/css">

.testing123{
    display:none;
}
  .overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, .4);
        transition: opacity .7s;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }
    .modal {
        position: relative;
        width: 500px;
        max-width: 80%;
        background: white;
        border-radius: 4px;
        padding: 2.5em;
        box-shadow: 0 5px 11px rgba(36, 37, 38, 0.08);
    }
    .modal .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: grey;
        text-decoration: none;
    }
    .overlay .cancel {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .overlay .button-group {
        justify-content: space-around;
        flex-wrap: wrap
    }
    .overlay .btn {
        flex-grow: 1;
        text-align: center;
        min-width: 40%;
        margin-top: 1em;

    }

    .overlay .btn:nth-child(2n) {
        margin-left: 2em;
    }

    footer:empty {
        display:none;
    }

</style>
