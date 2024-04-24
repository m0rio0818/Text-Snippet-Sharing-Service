<div class="d-flex flex-col  items-center justify-centerh-full prose">
    <div class="w-full border-2 border-gray-200">
        <div id="editor-container" style="height:400px;"></div>
    </div>
    <div class="flex flex-col items-center border-gray-300 bg-gray-100 py-4 card sm:w-1/2 w-5/6 my-4 mx-auto ">
        <h3 class="font-bold">Options</h3>
        <div class="w-full p-2">
            <label for="syntax_highlight" class="pb-1">Syntax HighLight: </label>
            <select id="syntax_highlight" name="syntax_highlight" class="form-select">
                <?php foreach ($syntaxHighLight as $key => $value) {
                ?>
                    <option value=<?php echo $key; ?> class=""><?php echo $key; ?></option>;
                <?php } ?>
            </select>
        </div>
        <div class="relative inline-block text-left w-full p-2">
            <label for="validTime" class="pb-1">Expireatoin Time: </label>
            <select id="validTime" name="validTime" class="form-select">
                <?php foreach ($validTime as $time) {
                ?>
                    <option value=<?php echo $time; ?> class=""><?php echo $time; ?></option>;
                <?php } ?>
            </select>
        </div>
        <div class="w-full py-3">
            <label for="title" class="">Title: </label>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 mx-auto focus:border-blue-500 block w-11/12 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="title">
        </div>

        <div class="w-full py-2 flex justify-center">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" id="create_snippet">Create Snippets</button>
        </div>
    </div>
</div>

<!-- Monaco Editor Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script src="/js/main.js"></script>
</script>