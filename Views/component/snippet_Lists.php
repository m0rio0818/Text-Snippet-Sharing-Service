<div class="d-flex justify-center mx-auto">
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse ">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-gray-800 border-b border-gray-400">Title</th>
                    <th class="px-4 py-2 text-gray-800 border-b border-gray-400">Language</th>
                    <th class="px-4 py-2 text-gray-800 border-b border-gray-400">created at</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($snippets); $i++) {
                    $currentSnippet = $snippets[$i];
                ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-200" id=snippet_<?php echo $currentSnippet["id"] ?>>
                        <td class="text-center py-1"><?php echo $currentSnippet["title"] ?></td>
                        <td class="text-center py-1"><?php echo $currentSnippet["language"] ?></td>
                        <td class="text-center py-1"><?php echo $currentSnippet["created_at"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    const snippets = <?php echo  json_encode($snippets) ?>
</script>
<script src="/js/snippet_list.js"></script>