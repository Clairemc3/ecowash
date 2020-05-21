<template>
    <div id="app">
        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig" tag-name="textarea" :name="name"></ckeditor>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

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
        },
        data() {
            return {
                editor: ClassicEditor,
                editorData: this.value,
                editorConfig: {
                    rows: 5,
                    toolbar: {
                        items: [
                            'heading',
                            'bold',
                            'bulletedList'
                        ],
                    },
                    heading: {
                        options: [
                            {
                                model: 'paragraphSmall',
                                view:{ name:'p', classes: 'small'},
                                title: 'Text small',
                                class: 'ck-paragraph__small',
                                converterPriority: 'high'
                            },
                            {
                                model: 'paragraphMedium',
                                view:{ name:'p', classes: 'medium'},
                                title: 'Text medium',
                                class: 'ck-paragraph__medium',
                                converterPriority: 'high'
                            },
                            {
                                model: 'paragraphLarge',
                                view:{ name:'p', classes: 'large'},
                                title: 'Text large',
                                class: 'ck-paragraph__large',
                                converterPriority: 'high'},
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading',
                                class: 'ck-heading_heading3' },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading large',
                                class: 'ck-heading_heading2'
                            }
                        ]
                    }
                }
            };
        }
    }
</script>