$('input[type="file"]').on('change', function () {

    var element = document.getElementById($(this).attr('id'));


    var data = element.files;
    var file = new FormData();
    var flag = false;
    var regex;
    var types = $(this).attr('types');

    regex = new RegExp("(.*?)\.(jo)$");
    var typeFile = data[0].type;
    console.log($('this'))

    file.append('file', data[0]);
    file.append('_token', $('#token').val());
    file.append('types', $(this).attr('types'));

    $.ajax({
        url: $('#url').val(),
        type: 'POST',
        contentType: false,
        data: file,
        processData: false,
        cache: false,
        beforeSend: function () {
            $('.preload').removeClass("hidden");
        },
        success: function (data) {

            if(data['success'] == "error"){
                alert('Tipo de archivo no permitido.');
                console.log('error');
            }
            else{
                element.previousElementSibling.innerText = data.route;
                element.nextElementSibling.value = data.route;
            }

            setTimeout(function () {
                $('.preload').addClass("hidden");
            }, 1000);
        },
        error: function (error) {
            console.log(error);
            $('.preload').addClass("hidden");
            alert('Error al cargar los archivos. Por favor vuelva a intentarlo.');
        }
    });
});