<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/usuario.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/usuario.php';
    include './HTML/pie.php';
?>