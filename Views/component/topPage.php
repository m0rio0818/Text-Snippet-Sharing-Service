<div class="pt-50 flex flex-col items-center justify-center h-full prose">
    <h1 class="text-center">Text Snipetter</h1>
    <div class="w-11/12 border-2 border-gray-200"> <!-- text-centerクラスを追加 -->
        <div id="editor-container" style="height:400px;"></div>
    </div>
    <div class="flex flex-col items-center border-gray-300 bg-gray-100 py-4 card sm:w-1/2 w-5/6 my-4 mx-auto px-5">
        <div class="flex items-center">
            <i class="fa-solid fa-gear fa-2xn  mx-1"></i>
            <h2 class="font-bold">Options</h2>
        </div>
        <div class="w-full pl-10 py-2">
            <div class="relative inline-block">
                <label for="syntax_highlight" class="pr-3">Syntax HighLight: </label>
                <select id="syntax_highlight" name="syntax_highlight" class="appearance-none border border-gray-300 rounded py-2 pl-3 pr-10 leading-tight focus:outline-none focus:border-gray-500">
                    <?php foreach ($syntaxHighLight as $key => $value) {
                    ?>
                        <option value=<?php echo $key; ?>><?php echo $key; ?></option>;
                    <?php } ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 12a1 1 0 0 1-.7-.29l-4-4a1 1 0 1 1 1.4-1.42L10 10.58l3.3-3.3a1 1 0 1 1 1.4 1.42l-4 4a1 1 0 0 1-.7.3z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full pl-10 py-2">
            <div class="relative inline-block">
                <label for="validTime" class="pr-3">Expireatoin Time: </label>
                <select id="validTime" name="validTime" class="appearance-none border border-gray-300 rounded py-2 pl-3 pr-10 leading-tight focus:outline-none focus:border-gray-500">
                    <?php foreach ($validTime as $key => $value) {
                    ?>
                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>;
                    <?php } ?>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 12a1 1 0 0 1-.7-.29l-4-4a1 1 0 1 1 1.4-1.42L10 10.58l3.3-3.3a1 1 0 1 1 1.4 1.42l-4 4a1 1 0 0 1-.7.3z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="flex items-center w-full py-2 pl-10">
            <div class="pr-3">
                <label for="title">Title:</label>
            </div>
            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500 mx-auto focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="title">
        </div>
        <div class="flex items-center w-full py-2 pl-10">
            <input id="publish" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="publish" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Add Publish Snippet List</label>
        </div>
        <div class="w-full py-2 flex justify-center">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" id="create_snippet">Create Snippets</button>
        </div>
    </div>
</div>
<!-- Monaco Editor Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script src="/js/main.js"></script>