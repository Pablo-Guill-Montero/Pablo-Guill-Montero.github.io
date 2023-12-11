<?php
    if (isset($_POST['titulo'])) {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        if($titulo=="" || trim($titulo)==""){
            header("Location: ./../nuevo_album.php?modo=1");
        }
        else {
            include './../model/albumModel.php';
            if(!isset($_SESSION))
                session_start();
            $idUsuario = $_SESSION["IdUsuario"];
            postAlbum($id, $titulo, $descripcion, $idUsuario);
        }

    }

?>