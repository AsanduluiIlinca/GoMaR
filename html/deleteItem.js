function deleteItem(path) {
    var inputs = document.getElementsByClassName("inputs"); //lista de elemente cu numele inputs
    var id;
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].checked == true) {
            id = inputs[i].attributes["value"].value;
            elementToDelete = inputs[i].parentNode;
            break;
        }
    }
    if (id !== undefined) {

        var xmlhttp = new XMLHttpRequest;

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                elementToDelete.parentNode.removeChild(elementToDelete);
                console.log(this.responseText);
            }
            console.log(this.responseText);
        }

        xmlhttp.open("POST", path);
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send(JSON.stringify({ "id": id, "ajax": 1}));


    }
}