
let config = {};


config.promotion = {
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
                view: {name: 'p', classes: 'small'},
                title: 'Text small',
                class: 'ck-paragraph__small',
                converterPriority: 'high'
            },
            {
                model: 'paragraphMedium',
                view: {name: 'p', classes: 'medium'},
                title: 'Text medium',
                class: 'ck-paragraph__medium',
                converterPriority: 'high'
            },
            {
                model: 'paragraphLarge',
                view: {name: 'p', classes: 'large'},
                title: 'Text large',
                class: 'ck-paragraph__large',
                converterPriority: 'high'
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading',
                class: 'ck-heading_heading3'
            },
            {
                model: 'heading2',
                view: 'h2',
                title: 'Heading large',
                class: 'ck-heading_heading2'
            }
        ]
    }
};


config.basic = {
    rows: 7,
    toolbar: {
        items: [
            'heading',
            'bold',
            'italic',
            'bulletedList',
            'link'
        ],
    },
    heading: {
        options: [
            {
                model: 'paragraph',
                title: 'Paragraph',
                class: 'ck-heading_paragraph',
            },
            {
                model: 'heading3',
                view: 'h3',
                title: 'Heading',
                class: 'ck-heading_heading3'
            },
        ]
    }
};



export { config }
