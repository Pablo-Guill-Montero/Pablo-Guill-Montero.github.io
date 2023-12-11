<?php
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    function postSolicitud($id, $album, $nombre, $titulo, $descripcion, $email, $direccion, $color, $copias, $resolucion, $fecha, $icolor, $fregistro, $coste){
        mysqli_query($id, 
        "INSERT INTO solicitudes ( Album, Nombre, Titulo, Descripcion, Email, Direccion, Color, Copias, Resolucion, Fecha, IColor, FRegistro, Coste)
        VALUES ( $album, '$nombre', '$titulo', '$descripcion', '$email', '$direccion', '$color', $copias, $resolucion, '$fecha', $icolor, '$fregistro', $coste)");
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        header("Location: ./../solicitar_album.php");
        exit;
    }
    //echo "Todo va bien";

    // Obtener el ID del nuevo álbum insertado
    
    mysqli_close($id);
    
    }
?>