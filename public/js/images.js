var $files = $('.images'),
    $output;

$files.on('change', function () {

    $output = $('.result');

    if (this.files[0].size < 2400000) {

        //$('.preload').removeClass("hidden");
        uploadImage(this.files[0]);

    } else {
        alert("El tamaño de la imagen debe ser inferior a 2MB");
    }

});

$files.on('dragover', function () {
    $(this).parents('figure').css({
        'border-style':'dashed'
    });

});
$files.on('dragleave', removeElement);
$files.on('drop', removeElement);
function removeElement() {
    $(this).parents('figure').css({
        'border-style':'solid',
    });
}
function uploadImage(file) {

    if (!file.type.match('image'))
        return;
    var reader = new FileReader();

    reader.addEventListener("load", function (event) {

        var picFile = event.target;
        var figure = document.createElement("span");
        $output.html('');
        figure.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
            "title='" + picFile.name + "'/>";
        if($('.Form-figure-user').hasClass('remove') ){
            $('.Form-figure-user img').remove();
        }
        $output.append(figure);

    });
    reader.readAsDataURL(file);

}