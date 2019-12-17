import Component from './Component';

let Plugin = {
    install: function (Vue, options = {}) {
       Vue.component('modal', Component)


       // Create a new vue instance to handle events
       Plugin.events = new Vue();


       Vue.prototype.$modal = {
           close() {
            Plugin.events.$emit('close');
           },

           open(params = {}) {
            Plugin.events.$emit('open', params);
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
                this.open(params);

                Plugin.events.$on('selected', confirmed => {
                    resolve(confirmed);
                });

            });

           },

       }
    }

};


export default Plugin;
