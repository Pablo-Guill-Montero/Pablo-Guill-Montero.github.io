<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    if(!(isset($_POST["nombre"]) 
    && isset($_POST["titulo"]) 
    && isset($_POST["adicional"]) 
    && isset($_POST["email"]) 
    && isset($_POST["calle"]) 
    && isset($_POST["numero"]) 
    && isset($_POST["localidad"]) 
    && isset($_POST["provincia"]) 
    && isset($_POST["telefono"]) 
    && isset($_POST["color"]) 
    && isset($_POST["cantidad"]) 
    && isset($_POST["resolucion"]) 
    && isset($_POST["album"]) 
    && isset($_POST["fecha"]))){
        header("Location: ./index.php"); 
    }

    include './controller/solicitar_album_respuesta.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/solicitar_album_respuesta.php';
    include './HTML/pie.php';
?>