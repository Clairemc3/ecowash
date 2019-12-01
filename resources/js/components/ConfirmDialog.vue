<template>


    <modal name="confirm">

        {{ message }}

        <template v-slot:footer>
             <button class="btn btn-teal" @click.prevent="handleClick(true)">Proceed</button>
             <button class="btn btn-teal" @click.prevent="handleClick(false)">Cancel</button>
        </template>

    </modal>
</template>

<script>

import Modal from '../plugins/modal/ModalPlugin';
    export default {

        data() {
            return {
                message: 'Are you sure?'
               } 
        },

        beforeMount () {
            // listen for plugin event
            // fetch the assicated params
            // assign them to data object
            Modal.events.$on('open', params => {
                this.message = params.message;
            })


        },

        methods: {
            handleClick(confirmed) {
                this.$emit('clicked', comfirmed);
                this.$modal.hide();
            }
        }
        
    }
</script>

<style lang="scss" scoped>

</style>