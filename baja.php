<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/baja.php';
    //include './model/estiloModel.php';
    include './model/albumModel.php';
    include './model/respuestaBusquedaModel.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/baja.php';
    include './HTML/pie.php';
?>