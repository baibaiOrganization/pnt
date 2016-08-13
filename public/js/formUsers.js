$('.Admin-payUpdate').on('click', function () {

    var r = confirm("Esta seguro de aceptar");
    if (r) {
        var data = {
                idUser: $(this).data('user'),
                _token: $('#token').val()
            },
            $loader = $(this).siblings('.loader');
        $(this).hide();
        $loader.show();

        $.post($('#tableUsers').data('route'), data, function (e) {
            if (e.success) {
                $loader.hide();
                var $tr = $('#user-' + data.idUser);
                $tr.find('.payUpdate').html('');
                $tr.find('.pay').html('Pagado');
            }
        });
    }

});
