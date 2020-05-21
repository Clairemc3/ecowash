<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData" :config="getConfiguration(configuration)" tag-name="textarea" :name="name"></ckeditor>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    import { config } from '../config/ckeditor-toolbars.js';

    export default {
        props: {
            name: {
                type: String,
                required: true,
            },
            value: {
                required: false,
                default: '',
            },
            configuration: {
                type: String,
                required: false,
                default: 'basic',
            },
        },


        methods: {
          getConfiguration(configurationName) {
              return config[configurationName];
          }
        },
        data() {
            return {
                editor: ClassicEditor,
                editorData: this.value,
            };
        }
    }
</script>