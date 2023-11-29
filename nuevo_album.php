<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/nuevo_album.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/nuevo_album.php';
    include './HTML/pie.php';
?>