function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#previewHolder").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        alert("select a file to see preview");
        $("#previewHolder").attr("src", "");
    }
}

$("#filePhoto").change(function() {
    readURL(this);
});
