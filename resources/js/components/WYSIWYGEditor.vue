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
                            { model: 'paragraph', view: 'p.medium', title: 'Text small', class: 'ck-paragraph_small' },
                            { model: 'paragraph', title: 'Text medium', class: 'ck-paragraph_medium' },
                            { model: 'paragraph', title: 'Text large', class: 'ck-paragraph_large' },
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                }
            };
        }
    }
</script>