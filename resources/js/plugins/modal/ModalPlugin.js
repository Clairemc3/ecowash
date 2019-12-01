import Component from './Component';

let Plugin = {
    install: function (Vue, options = {}) {
       Vue.component('modal', Component)


       // Create a new vue instance to handle events
       Plugin.events = new Vue();


       Vue.prototype.$modal = {
           open(name, params = {}) {
            location.hash = name;

            // fire an event on the plugin to include the params
            Plugin.events.$emit('open', params);

           },

           close(name) {
            location.hash = '#';
           },

           confirm(message) { // this.$modal.confirm ('Are you sure?')
               this.open('confirm', {message});
           },

           shut(params = {}) {
            // location.hash = name;

            // fire an event on the plugin to include the params
            Plugin.events.$emit('shut', params);

           },
       }
    }

};


export default Plugin;