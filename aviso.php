<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/aviso.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/aviso.php';
    include './HTML/pie.php';
?>