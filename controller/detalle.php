<?php 
    $titulo = "Detalle-GameScape";
    if(isset($_GET["id"])) {
        if(is_numeric($_GET["id"])){
            $idFoto = $_GET["id"];
            //$mensaje = "El valor de \$id es $id";
            include "./Model/fotoModel.php";
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