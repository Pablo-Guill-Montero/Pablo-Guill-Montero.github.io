<?php
    //Lo primero siempre es el session start (siempre que necesitemos la sesion)
    session_start();
    if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){             
        header("Location: ./index.php");        
    }         
    else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){             
        header("Location: ./index.php"); 
    }else if(!(isset($_GET['nombre']) && isset($_GET['pwd']) && isset($_GET['pwd2']) && isset($_GET['email']) && isset($_GET['sexo']) && isset($_GET['fecha']) && isset($_GET['ciudad']) && isset($_GET['pais']))){
        header("Location: ./index.php"); 
    }  

    include './controller/nuevo_usuario.php';
    include './HTML/cabecera.php';
    include './HTML/nav.php';
    include './HTML/nuevo_usuario.php';
    include './HTML/pie.php';
?>