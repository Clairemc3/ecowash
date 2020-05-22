<template>

    <modal>
        <template v-slot:trigger>
            <slot name="trigger"></slot>
        </template>
        <p>
        {{ params.message }}
        </p>

        <template v-slot:footer>
            <div class="button-group">
                 <button class="btn btn-teal" @click.prevent="handleClick(true)" v-text="params.proceedButton"></button>
                 <button class="btn btn-white" @click.prevent="handleClick(false)" v-text="params.cancelButton"></button>
            </div>
        </template>

    </modal>
</template>

<script>

import Modal from '../plugins/modal/ModalPlugin';
    export default {

        data() {
            return {
                params: {
                     message: 'Are you sure?',
                     proceedButton: 'Confirm',
                     cancelButton: 'Cancel'
                }
               }
        },

        beforeMount () {
            // listen for plugin event
            // fetch the assoicated params
            // assign them to data object
            Modal.events.$on('open', params => {
               Object.assign(this.params, params)
            })
        },

        methods: {
            handleClick(confirmed) {
                Modal.events.$emit('selected', confirmed);
                this.$modal.close();
            }
        }

    }
</script>
