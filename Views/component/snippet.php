<div class="mt-4">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <p><?php echo $language ?></p>
        <div class="col-12">
            <!-- Monaco Editorを配置するコンテナ -->
            <div id="editor-container" class="col-12" style="height: 400px; border: 0.5px solid gray"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Monaco Editor Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.20.0/min/vs/loader.min.js"></script>
<script>
    let language = <?php echo json_encode($language); ?>;
    let content = <?php echo json_encode($content); ?>;
</script>
<script src="/js/snippet.js"></script>
</script>