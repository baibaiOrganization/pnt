$('input[type="file"]').on('change', function () {

    var element = document.getElementById($(this).attr('id'));


    var data = element.files;
    var file = new FormData();
    var flag = false;
    var regex;
    var types = $(this).attr('types');

    regex = new RegExp("(.*?)\.(" + types.replace(',', '|') + ")$");
    var typeFile = data[0].type;


    file.append('file', data[0]);
    file.append('_token', $('#token').val());

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

            console.log(data);
            if(!data['success']){
                console.log('error');
                return;
            }
            console.log('Se sube archivo de manera exitosa.');
            /*element.previousElementSibling.innerText = data.route;
            element.nextElementSibling.value = data.route;*/
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