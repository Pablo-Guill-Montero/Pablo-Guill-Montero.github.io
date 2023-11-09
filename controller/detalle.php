<?php 
    $titulo = "Detalle-GameScape";
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        //$mensaje = "El valor de \$id es $id";

        if($id % 2 == 0){
            $tituloFoto = "El gran árbol áureo";
            $ruta = "./aureo.jpeg";
            $datetime = "2023-07-05T18:00:00";
            $fecha = "05-07-2023";
            $videojuego = "Elden Ring";
            $album = "Mi rincón";
            $usuario = "TONIKABUTO";
        }     
        else{
            $tituloFoto = "Random team";
            $ruta = "./img.jpg";
            $fecha = "17-01-2023";
            $datetime = "2023-01-17T18:00:00";
            $videojuego = "Team Fortess 2";
            $album = "Crazy album";
            $usuario = "Makareno666";
        }
    }
    else {
        $error = "Error en los parámetros de entrada";
    }
?>