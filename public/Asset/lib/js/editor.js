function addNewNote() {
    $('#addNoteDetail').modal('show');

    const editorBody = [{
            "title": 'Summary',
            "placeholder": 'Problem summary here.'
        },
        {
            "title": 'Detail Problem',
            "placeholder": 'Problem details here.'
        },
        {
            "title": 'Error Messages',
            "placeholder": 'Error Messages.'
        },
        {
            "title": 'Solution',
            "placeholder": 'Your solution/ idea here.'
        },
    ];

    let editor = [];

    for (let index = 0; index < editorBody.length; index++) {
        if ($(`#snow-editor-${index}`).length < 1) {
            $('#text-editor').append(`
        <div class="col-12">
            <div class="card mb-4">
            <h5 class="card-header" id="editor-heading-${index}">${editorBody[index]['title']}</h5>
            <div class="card-body">
                <div id="snow-editor-${index}"></div>
            </div>
            </div>
        </div>
        `);
            editor[index] = new Quill(`#snow-editor-${index}`, {
                toolbar: true,
                placeholder: `${editorBody[index]['placeholder']}`,
                theme: 'snow'
            });
        }
    }

    /*
      $('#snow-editor-0 .ql-editor')[0].innerHTML -> GET ITEM HTML FROM EDITOR
    */
}
