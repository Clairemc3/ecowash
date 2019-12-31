import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
.create( document.querySelector( '#ckeditor' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Normal', class: 'ck-heading_paragraph' },
            { model: 'heading3', view: 'h3', title: 'Heading large', class: 'ck-heading_heading3' }
        ]
    },
    fontColor: {
        colors: [
            {
                color: 'hsl(0, 0%, 0%)',
                label: 'Black'
            },
        ]
},
} )
.catch( error => {
    console.log( error );
} );
