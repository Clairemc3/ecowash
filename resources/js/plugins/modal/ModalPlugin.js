import Component from './Component';

let Plugin = {
    install: function (Vue, options = {}) {
       Vue.component('modal', Component)


       // Create a new vue instance to handle events
       Plugin.events = new Vue();


       Vue.prototype.$modal = {
           show(name, params = {}) {
            location.hash = name;

            // fire an event on the plugin to include the params
            Plugin.events.$emit('show', params);

           },

           close() {
            Plugin.events.$emit('close');
           },

           open() {
            Plugin.events.$emit('open');
           },

           hide(name) {
            location.hash = '#';
           },

           dialog(message, params = {}) {

                // Dialog can be created with a string, an object or both
                if (typeof message === 'string') {
                    params.message = message;
                } else {
                    params = message;
                }

                return new Promise((resolve, reject ) => {

                // Open the modal with a custom message
                this.show('dialog', params );

                Plugin.events.$on('selected', confirmed => {
                    resolve(confirmed);
                });

            });

           },

       }
    }

};


export default Plugin;
