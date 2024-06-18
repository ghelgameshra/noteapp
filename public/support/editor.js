function insertEditor(data){
    for (let index = 0; index < data.length; index++) {
        $('#text-editor').append( `
        <div class="col-12">
            <div class="card mb-4">
            <h5 class="card-header" id="editor-heading-${index}">${data[index]['title']}</h5>
            <div class="card-body">
                <div id="snow-toolbar-${index}">
                <span class="ql-formats">
                    <select class="ql-font"></select>
                    <select class="ql-size"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                </span>
                <span class="ql-formats">
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-script" value="sub"></button>
                    <button class="ql-script" value="super"></button>
                </span>
                <span class="ql-formats">
                    <button class="ql-header" value="1"></button>
                    <button class="ql-header" value="2"></button>
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                </span>
                </div>
                <div id="snow-editor-${index}"></div>
            </div>
            </div>
        </div>
        `);
    }

    for (let index = 0; index < data.length; index++) {
        new Quill(`#snow-editor-${index}`, {
            bounds: `#snow-editor-${index}`,
            modules: {
                formula: true,
                toolbar: `#snow-toolbar-${index}`
            },
            placeholder: `${data[index]['placeholder']}`,
            theme: 'snow'
        });
    }
}
