<template>
    <div :id="name" class="overlay text-left">
        <a href="#" class="cancel"></a>

            <!-- menu -->

        <div class="modal">
                <div v-show="controller">
       <p>This is what we are trying to control</p>
    </div>
            <slot></slot>
            <footer>
                <slot name="footer"></slot>
            </footer>

            <a href="#" class="close text-3xl">&times</a>
        </div>
    </div>
</template>

 <slot></slot>
<script>

import Modal from './ModalPlugin';
    export default {

       data() {
         return {
            controller: true
         } 
        },

        mounted() {
            alert('mounted');
            // this.controller = false;
            // listen for plugin event
            // fetch the assicated params
            // assign them to data object
            Modal.events.$on('shut', params => {
                this.controller = false;
            })
        },


        props: ['name'],
        
    }
</script>

<style type="text/css">

  .overlay {
        visibility: hidden;
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
        opacity: 0;
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