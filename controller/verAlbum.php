<?php 
    $titulo = "Ver Album-GameScape";
    if (isset($_SESSION["usuario"]))
        $archivo = "detalle.php";
    else $archivo = "aviso.php";
    if(isset($_GET["id"])) {
        if(is_numeric($_GET["id"])){
            $idAlbum = $_GET["id"];
            //$mensaje = "El valor de \$id es $id";
            include "./Model/albumModel.php";
        }
        else {
            $error = "Error en los parámetros de entrada";
            header("Location: ./index.php");
        }
    }
    else {
        $error = "Error en los parámetros de entrada";
        header("Location: ./index.php");
    }
?>