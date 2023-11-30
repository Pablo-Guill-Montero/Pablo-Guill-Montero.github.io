<?php
    include "./controller/sessionController.php";
?>
    <main>
        <?php
            $nombre = "";
            $pwd = "";
            $pwd2 = "";
            $email = "";
            $sexo = "";
            $fecha = "";
            $ciudad = "";
            $pais = "";
            $foto = '/vacia.jpg';
        if(isset($_GET['nombre']) && isset($_GET['pwd']) && isset($_GET['pwd2']) && isset($_GET['email']) && isset($_GET['sexo']) && isset($_GET['fecha']) && isset($_GET['ciudad']) && isset($_GET['pais'])){  
            $nombre = $_GET['nombre'];
            $pwd = $_GET['pwd'];
            $pwd2 = $_GET['pwd2'];
            $email = $_GET['email'];
            $sexo = $_GET['sexo'];
            $fecha = $_GET['fecha'];
            $ciuudad = $_GET['ciudad'];
            $pais = $_GET['pais'];

            if($nombre ==""){
                echo '<p>Tienes que rellenar el nombre</p>';
            }
            if($pwd ==""){
                echo '<p>Tienes que rellenar la contraseña</p>';
            }
            if($pwd2 ==""){
                echo '<p>Tienes que rellenar la 2ª contraseña</p>';
            }
            else if($pwd != $pwd2){
                echo '<p>Las 2 contraseñase deberian ser iguales</p>';
            }
        }    
        ?>
        <h1>Registro</h1>
       <?php
            include './HTML/formulario.php';
       ?>
        
    </main>


