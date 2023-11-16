<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();

    if(!(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima']))){             
        header("Location: ./aviso.php"); 
    }         
    else if(!(isset($_SESSION['usuario']) && isset($_SESSION['pwd']))){             
        header("Location: ./aviso.php"); 
    }else{
        include './controller/detalle.php';
        include './HTML/cabecera.php';
        include './HTML/nav.php';
        include './HTML/detalle.php';
        include './HTML/pie.php'; 
    }
    
?>