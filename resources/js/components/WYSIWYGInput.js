import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

ClassicEditor
.create( document.querySelector( '#ckeditor' ), {
    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList' ],
    heading: {
        options: [
            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
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
