<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    include './controller/perfil.php';
    //include './model/perfilModel.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/perfil.php';
    include './HTML/pie.php';
?>