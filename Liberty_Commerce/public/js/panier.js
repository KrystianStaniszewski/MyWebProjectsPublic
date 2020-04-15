function AddItem(id) {
    var id = localStorage.setItem("Produit", id);
    function addTextNode(text) {
        var newtext = document.createTextNode(text),
            p1 = document.getElementById("name");

        p1.appendChild(newtext);
    }
}

