require.config({
    paths: {
        'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
    }
});


const copiedMessage = document.getElementById("copied");

require(['vs/editor/editor.main'], function () {
    let editor = monaco.editor.create(document.getElementById('editor-container'), {
        value: content,
        language: language,
        readOnly: true // 読み取り専用モードを有効にする
    });
    const code_copy = document.getElementById("code_copy");
    code_copy.addEventListener("click", () => {
        let value = editor.getValue();
        navigator.clipboard.writeText(value);

        copiedMessage.innerText = "Code Copied!";
        copiedMessage.classList.remove("hidden");

        setTimeout(() => {
            copiedMessage.classList.add("hidden");
        }, 1000)
    })
})


const url_copy = document.getElementById("url_copy");
url_copy.addEventListener("click", () => {
    const location = window.location.href;
    navigator.clipboard.writeText(location);

    copiedMessage.innerText = "URL Copied!";
    copiedMessage.classList.remove("hidden");

    setTimeout(() => {
        copiedMessage.classList.add("hidden");
    }, 1000)
})
