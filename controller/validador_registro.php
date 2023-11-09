<?php
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['sexo'])) {
        $sexo = $_POST['sexo'];
    }
    if (isset($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
    }
    if (isset($_POST['ciudad'])) {
        $ciudad = $_POST['ciudad'];
    }
    if (isset($_POST['pais'])) {
        $pais = $_POST['pais'];
    }
    $prueva = false;
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        if ($nombre == "") {
           $prueva = true;
            
        }
    } else {
        echo "No se ha enviado ningún valor para el campo de nombre.";
    }
    if($prueva == true){
        echo "salta en 1 \n";
    }

    if (isset($_POST['pwd'])) {
        $pwd = $_POST['pwd'];
        if ($pwd == "") {
           $prueva = true;
            
        }
    } else {
        echo "No se ha enviado ningún valor para el campo de pwd.";
    }
    if($prueva){
        echo "salta en 2 \n";
    }
    
    if (isset($_POST['pwd2'])) {
        $pwd2 = $_POST['pwd2'];
        if ($pwd != $pwd2) {
           $prueva = true;
            
        }
    } else {
        echo "No se ha enviado ningún valor para el campo de pwd2.";
    }
    if($prueva){
        echo "salta en 3 \n";
    }
    
    if($prueva){
        header("Location: ./../registro.php?nombre=$nombre&pwd=$pwd&pwd2=$pwd2&email=$email&sexo=$sexo&fecha=$fecha&ciudad=$ciudad&pais=$pais"); 
        
    }
    else{
        header("Location: ./../nuevo_usuario.php?nombre=$nombre&pwd=$pwd&pwd2=$pwd2&email=$email&sexo=$sexo&fecha=$fecha&ciudad=$ciudad&pais=$pais"); 
    }
?>