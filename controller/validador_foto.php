<?php
    if (isset($_POST['titulo']) && isset($_POST['alternativo'])) {
        $titulo = $_POST['titulo'];
        $alternativo = $_POST['alternativo'];

        $alternativoLower = strtolower($alternativo);
        $empiezaFoto = strpos($alternativoLower, "foto") === 0;
        $empiezaImagen = strpos($alternativoLower, "imagen") === 0;

        if($titulo=="" || trim($titulo)=="" || $alternativo=="" || trim($alternativo)=="" || strlen($alternativo)<10){
            header("Location: ./../anadir_foto_album.php?modo=1");
        }
        else if($empiezaFoto || $empiezaImagen){
            header("Location: ./../anadir_foto_album.php?modo=2");
        }
        else {
            include './../model/fotoModel.php';
            if(!isset($_SESSION))
                session_start();
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];
            $pais = $_POST['pais'];
            $album = $_POST['album'];
            $fichero = $_POST['foto'];
            postFoto($id, $titulo, $descripcion, $fecha, $pais, $album, $fichero, $alternativo);
        }

    }

?>