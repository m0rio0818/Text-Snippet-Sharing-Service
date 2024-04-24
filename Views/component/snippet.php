<?php
// var_dump($data);
$title = $data["title"];
$url = $data["url"];
$language = $data["language"];
$content = $data["content"];
$created_at = $data["created_at"];
$expire_at = $data["expire_at"];
?>
<div class="mt-4 flex justify-center">
    <div class="flex flex-col items-center justify-center w-full ">
        <div class="mb-5 bg-green-300">
            <h5 class="card-title"> Title : <?php echo $title ?></h5>
            <p class="card-text">language : <?php echo $language ?></p>
            <p class="card-text">created_at : <?php echo $created_at ?></p>
            <p class="card-text">expire_at : <?php echo $expire_at ?></p>
        </div>
        <div>
        </div>
        <div class="w-full border-gray-200 border-2">
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