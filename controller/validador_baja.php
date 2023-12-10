<?php
if (isset($_POST['pwd']) && $_POST['pwd']!="") {
    $pwd = $_POST['pwd'];
    include './../model/perfilModel.php';
    if(!isset($_SESSION))
        session_start();
    $miPerfil = getPerfil($id, $_SESSION["IdUsuario"]);
    $row = mysqli_fetch_assoc($miPerfil);
    $clave = $row["Clave"];
    mysqli_free_result($miPerfil);
    if ($clave == $pwd){
        deletePerfil($id, $_SESSION["IdUsuario"], $pwd);
        mysqli_close($id);
        header("Location: ./../logout.php");
    }else { //contrseña incorrecta
        header("Location: ./../baja.php");
    }
}else{
    header("Location: ./../baja.php");
}
?>