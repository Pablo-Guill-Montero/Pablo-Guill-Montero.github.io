<?php
if (isset($_POST['nombre']) && isset($_POST['pwd'])) {
    $nombre = $_POST['nombre'];
    $pwd = $_POST['pwd'];

    if($nombre=="" && $pwd==""){
        header("Location: ./../login.php?nombre=$nombre&pwd=$pwd");
    }
    else if($nombre==""){
        header("Location: ./../login.php?nombre=$nombre");
    }
    else if ($pwd=="") {
        header("Location: ./../login.php?pwd=$pwd");
    }else {
        include './../model/loginModel.php';
        header("Location: ./../usuario.php");
    }
}
?>