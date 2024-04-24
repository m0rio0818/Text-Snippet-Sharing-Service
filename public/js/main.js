require.config({
    paths: {
        'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
    }
});

require(['vs/editor/editor.main'], function () {
    let editor = monaco.editor.create(document.getElementById('editor-container'), {
        value: "ここにテキストを入力してください\n",
        language: 'plaintext'
    });

    let create_snippet = document.getElementById("create_snippet");
    create_snippet.addEventListener("click", () => {
        let syntax_highlight = document.getElementById("syntax_highlight");
        let validTime = document.getElementById("validTime");
        let title = document.getElementById("title");
        let editorEle = document.getElementById("editor-container");
        title = !title.value ? "undefined" : title.value;
        let value = editor.getValue();

        data = {
            syntax_highlight: syntax_highlight.value,
            title: title,
            validTime: validTime.value,
            content: value
        }

        const jsonBody = JSON.stringify(data)
        console.log((jsonBody))

        const requestPath = "";
        const requet = new Request(requestPath, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: jsonBody
        })

        fetch(requet)
            .then(response => response.json())
            .then(data => {
                // if (data === "success") {
                //     console.log("DDD", data);
                // }
                console.log(data)
                if (data["success"]) {
                    console.log("SUCESS");
                    window.location.href = data["url"]
                }
            })
    })


    let syntax_highlight = document.getElementById("syntax_highlight");
    console.log(syntax_highlight);
    syntax_highlight.addEventListener("change", () => {
        let value = syntax_highlight.value;
        let model = editor.getModel();

        monaco.editor.setModelLanguage(model, value);
        console.log(value);
    })

    editor.onDidChangeModelContent(() => {
        // let value = editor.getValue();
        // console.log(value);
    });
})