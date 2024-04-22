<div class="mt-4">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <div class="col-12">
            <!-- Monaco Editorを配置するコンテナ -->
            <div id="editor-container" class="col-12" style="height: 400px; border: 0.5px solid gray"></div>
        </div>
    </div>
    <div class="d-flex flex-column align-items-center py-4 card col-12 col-sm-8 my-4 mx-auto col-md-6 ">
        <h3>Options</h3>
        <div class="col-12 p-2">
            <label for="syntax_highlight" class="pb-1">Syntax HighLight: </label>
            <select id="syntax_highlight" name="syntax_highlight" class="form-select">
                <?php foreach ($syntaxHighLight as $key => $value) {
                ?>
                    <option value=<?php echo $key; ?> class=""><?php echo $key; ?></option>;
                <?php } ?>
            </select>
        </div>
        <div class="col-12 p-2">
            <label for="validTime" class="pb-1">Expireatoin Time: </label>
            <select id="validTime" name="validTime" class="form-select">
                <?php foreach ($validTime as $time) {
                ?>
                    <option value=<?php echo $time; ?> class=""><?php echo $time; ?></option>;
                <?php } ?>
            </select>
        </div>
        <div class="col-12 p-2">
            <label for="title" class="pb-1">Title: </label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="col-12 p-2 d-flex justify-content-center">
            <button class="btn btn-success" id="create_snippet">Create Snippets</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Monaco Editor Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script src="/src/js/main.js"></script>
<script>
    require.config({
        paths: {
            'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs'
        }
    });

    require(['vs/editor/editor.main'], function() {
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

            const jsonBody = JSON.stringify({
                syntax_highlight: syntax_highlight.value,
                title: title,
                validTime: validTime.value,
                data: value
            })

            const requestPath = "/Helpers/createURL.php";
            const requet = new Request(requestPath, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    syntax_highlight: syntax_highlight.value,
                    title: title,
                    validTime: validTime.value,
                    data: value
                })
            })

            fetch(requet)
                .then(response => response.json())
                .then(data => {
                    console.log("DDD", data);
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
</script>