require('../../public/js/ckeditor')

const watchdog = new CKSource.Watchdog();

window.watchdog = watchdog;

watchdog.setCreator((element, config) => {
    return CKSource.Editor
        .create(element, config)
        .then(editor => {
            // Set a custom container for the toolbar.
            document.querySelector('.document-editor__toolbar').appendChild(editor.ui.view.toolbar
                .element);
            document.querySelector('.ck-toolbar').classList.add('ck-reset_all');

            return editor;
        })
});

watchdog.setDestructor(editor => {
    // Set a custom container for the toolbar.
    document.querySelector('.document-editor__toolbar').removeChild(editor.ui.view.toolbar.element);

    return editor.destroy();
});

watchdog.on('error', handleError);

watchdog
    .create(document.querySelector('.editor'), {
        simpleUpload: {
            uploadUrl: 'http://127.0.0.1/my-upload-endpoint'
        },
        toolbar: {
            items: [
                'heading',
                '|',
                'fontSize',
                'fontFamily',
                '|',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                'highlight',
                '|',
                'alignment',
                '|',
                'numberedList',
                'bulletedList',
                '|',
                'indent',
                'outdent',
                '|',
                'link',
                'blockQuote',
                'imageUpload',
                'insertTable',
                'mediaEmbed',
                '|',
                'undo',
                'redo',
                '|',
                'code',
                'codeBlock'
            ]
        },
        language: 'tr',
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side',
                'linkImage'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells',
                'tableCellProperties',
                'tableProperties'
            ]
        },
    })
    .catch(handleError);

function handleError(error) {
    console.error('Oops, something went wrong!');
    console.error(
        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
    );
    console.warn('Build id: 5jcczxx0mw2e-ci4x3qg1m4f4');
    console.error(error);
}