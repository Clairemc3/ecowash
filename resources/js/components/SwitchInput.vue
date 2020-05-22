<template>
    <div class="field">
        <input type="checkbox" :name="name" class="switch is-thin is-success" :checked="switchValue" value="1">
        <label @click="switchValue = !switchValue"> {{ switchLabel }}</label>
        <input v-if="!switchValue" type="hidden" value="0" :name="name"/>
    </div>

</template>


<script>
    export default {

        computed: {
            /**
             * Returns the label to be displayed next to the switch
             * @returns {string}
             */
            switchLabel() {
                return this.switchValue
                    ? this.activeLabel : this.inactiveLabel;
            }
        },

        props: {
            value: {
                type: Boolean,
                default: false
            },
            name: {
                type: String,
                required: true
            },
            activeLabel: {
                type: String,
                default: 'Active'
            },
            inactiveLabel: {
                type: String,
                default: 'Inactive'
            },
        },
        data () {
            return {
                switchValue: this.value,
            }
        },
    }
</script>

<style scoped>
    .switch[type=checkbox] + label {
        font-size: 0.75rem;
    }
</style>