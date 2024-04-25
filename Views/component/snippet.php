<?php

use Helpers\ValidationHelper;

$title = $data["title"];
$url = $data["url"];
$language = $data["language"];
$content = $data["content"];
$exipration = $data["expiration"];
$created_at = $data["created_at"];
$expire_at = $data["expire_at"];


$timeLists = ValidationHelper::getExpiretionKeyValue();
$exipration_key = array_search($exipration, $timeLists);
?>

<div class="mt-5 flex justify-center">
    <div class="flex flex-col items-center justify-center w-full mt-6">
        <div class="mb-5 w-full pl-14">
            <div class="flex items-center">
                <i class="px-2 fa-regular fa-file fa-2x"></i>
                <h3>Title : <?php echo $title ?></h3>
            </div>
            <div class="flex items-center py-1">
                <i class="px-2 fa-solid fa-code"></i>
                <p>Language : <?php echo $language ?></p>
            </div>
            <div class="flex items-center py-1">
                <i class="px-2 fa-solid fa-plus"></i>
                <p class=" ">Created At : <?php echo $created_at ?></p>
            </div>

            <div class="flex items-center py-1">
                <i class="px-2 fa-solid fa-stopwatch"></i>
                <p>Expiration : <?php echo $exipration_key ?></p>
            </div>
            <div class="flex items-center py-1">
                <i class="px-2  fa-solid fa-calendar-week"></i>
                <p>Expire At : <?php echo $expire_at ?></p>
            </div>
        </div>
        <div class="flex justify-center items-center mb-3 w-full">
            <div class="flex justify-end">
                <div id="url_copy" class="p-3 flex items-center justify-center hover:bg-green-200">
                    <div class="">
                        <i class="px-3 fa-solid fa-link"></i>
                    </div>
                    <p> Copy URL </p>
                </div>
                <div id="code_copy" class="p-3 flex items-center hover:bg-green-200">
                    <div class="">
                        <i class="px-3 fa-solid fa-code"></i>
                    </div>
                    <p> Copy Code</p>
                </div>
            </div>
            <div class="absolute right-20 ">
                <p id="copied" class="hidden text-green-500">✔︎ Copied!</p>
            </div>
        </div>
        <div class="w-11/12 border-gray-200 border-2">
            <!-- Monaco Editorを配置するコンテナ -->
            <div id="editor-container" style="height: 400px;"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Monaco Editor Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script>
    let title = <?php echo json_encode($title); ?>;
    let url = <?php echo json_encode($url); ?>;
    let language = <?php echo json_encode($language); ?>;
    let content = <?php echo json_encode($content); ?>;
    let created_at = <?php echo json_encode($created_at); ?>;
    let expire_at = <?php echo json_encode($expire_at); ?>;
</script>
<script src="/js/snippet.js"></script>
</script>