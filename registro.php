<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/registro.php';
    include './model/paisesModel.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/registro.php';
    include './HTML/pie.php';
?>