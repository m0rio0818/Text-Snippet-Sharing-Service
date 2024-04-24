console.log(language);
console.log(content);

require.config({
    paths: {
        'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
    }
});

require(['vs/editor/editor.main'], function () {
    let editor = monaco.editor.create(document.getElementById('editor-container'), {
        value: content,
        language: language,
        readOnly: true // 読み取り専用モードを有効にする
    });
})
