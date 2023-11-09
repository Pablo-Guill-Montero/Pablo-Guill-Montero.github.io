<?php
$prueva = false;
$prueva2 = false; 
$usuario1 = "Iker";
$usuario2 = "Pablo";
$usuario3 = "Jaime";
$usuario4 = "Migel";
$contra1 = "Iker123";
$contra2 = "Pablo123";
$contra3 = "Jaime123";
$contra4 = "Miguel123"; 
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
    header("Location: ./../login.php?nombre=$nombre&pwd=$pwd");
}
else{
    if($nombre == $usuario1){
        if($pwd != $contra1){
            $prueva2 = true;
        }
        else{
            header("Location: ./../usuario.php");
        }
    }
    else if($nombre == $usuario2){
        if($pwd != $contra2){
            $prueva2 = true;
        }
        else{
            header("Location: ./../usuario.php");
        }
    }
    else if($nombre == $usuario3){
        if($pwd != $contra3){
            $prueva2 = true;
        }
        else{
            header("Location: ./../usuario.php");
        }
    }
    else if($nombre == $usuario4){
        if($pwd != $contra4){
            $prueva2 = true;
        }
        else{

        }
    }
    else{
        header("Location: ./../login.php?modo=1");
    }
    
}
?>