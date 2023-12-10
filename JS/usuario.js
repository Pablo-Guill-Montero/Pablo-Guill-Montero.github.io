function cambiarEstilo(idUsuario, idEstilo, nombreEstilo, descripcionEstilo, ficheroEstilo) {
    $.ajax({
        url: './model/estiloModel.php',
        type: 'post',
        data: {idUsuario: idUsuario, idEstilo: idEstilo, nombreEstilo: nombreEstilo, descripcionEstilo: descripcionEstilo, ficheroEstilo: ficheroEstilo},
        success: function(response) {
            location.reload();
        }
    });
}