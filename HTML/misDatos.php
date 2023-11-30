<?php
    include "./controller/sessionController.php";
?>
    <main>
        <?php
      
        if(isset( $_SESSION['usuario'])){
            $nombre =  $_SESSION['usuario'];
        }
        else{
            $nombre = "";
        }
        if(isset( $_SESSION['pwd'])){
            $pwd =  $_SESSION['pwd'];
            $pwd2 =  $_SESSION['pwd'];
        }
        else{
            $pwd = "";
            $pwd2 = "";
        }
        if(isset( $_SESSION['email'])){
            $email =  $_SESSION['email'];
        }
        else{
            $email = "";
        }
        if(isset( $_SESSION['usuario'])){
            $nombre =  $_SESSION['usuario'];
        }
        else{
            $nombre = "";
        }
        if(isset( $_SESSION['sexo'])){
            if($_SESSION['sexo'] == 0){
                $sexo = "Mujer";
            }
            else if($_SESSION['sexo'] == 1){
                $sexo = "Hombre";
            }
            else{
                $sexo = "Otro";
            }
        }
        else{
            $sexo = "";
        }
        if(isset( $_SESSION['FNacimiento'])){
            $fecha =  $_SESSION['FNacimiento'];
        }
        else{
            $fecha = "";
        }
        if(isset( $_SESSION['ciudad'])){
            $ciudad =  $_SESSION['ciudad'];
        }
        else{
            $ciudad = "";
        }
        if(isset( $_SESSION['pais'])){
            $pais =  $_SESSION['pais'];
        }
        else{
            $pais = "";
        }
        if(isset( $_SESSION['FNacimiento'])){
            $fecha =  $_SESSION['FNacimiento'];
        }
        else{
            $fecha = "";
        }
        if(isset( $_SESSION['foto'])){
            $foto =  $_SESSION['foto'];
        }
        else{
            $foto = "";
        }
        if(isset( $_SESSION['FRegistro'])){
            $fechaRegistro =  $_SESSION['FRegistro'];
        }
        else{
            $fechaRegistro = "";
        }
        ?>
        <h1>Mis datos</h1>
        <?php
            include './HTML/formulario.php';
        ?>
        
    </main>


