<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();

    include './controller/buscar.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/buscar.php';
    include './HTML/pie.php';
?>