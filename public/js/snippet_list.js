for (let i = 0; i < snippets.length; i++) {
    let currSnippet = snippets[i];
    let currSnippetItem = document.getElementById("snippet_" + currSnippet["id"]);
    // console.log(currSnippetItem);
    currSnippetItem.addEventListener("click", () => {
        window.location.href = "/snippet/" + currSnippet["url"];
    })
}