<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/solicitar_album.php';
    include './model/albumModel.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/solicitar_album.php';
    include './HTML/pie.php';
?>