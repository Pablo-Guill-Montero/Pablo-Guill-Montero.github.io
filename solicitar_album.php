<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    if(!(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima']))){             
        header("Location: ./index.php");        
    }         
    else if(!(isset($_SESSION['usuario']) && isset($_SESSION['pwd']))){             
        header("Location: ./index.php"); 
    }
    include './controller/solicitar_album.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/solicitar_album.php';
    include './HTML/pie.php';
?>