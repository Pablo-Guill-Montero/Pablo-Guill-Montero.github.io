<?php 
    $titulo = "Detalle-GameScape";
    if(isset($_GET["id"])) {
        $idFoto = $_GET["id"];
        //$mensaje = "El valor de \$id es $id";
        include "./Model/fotoModel.php";
        $row = mysqli_fetch_assoc($resultado);
        $tituloFoto = $row["Titulo"];
        $descripcion = $row["Descripcion"];
        $fecha = $row["Fecha"];
        $pais = $row["Pais"];
        $idPais = $row["idPais"];
        $album = $row["Album"];
        $fichero = $row["Fichero"];
        $alternativo = $row["Alternativo"];
        $fechaRegistro = $row["FRegistro"];
        $tituloAlbum = $row["a.Titulo"];
        $usuario = $row["u.NomUsuario"];
        $idUsuario = $row["a.Usuario"];

        mysqli_free_result($resultado);
        mysqli_close($id);

    }
    else {
        $error = "Error en los parámetros de entrada";
        header("Location: ./index.php");
    }
?>