<?php 
    $titulo = "Solicitar_Album_Respuesta-GameScape";
    $nombre = $_POST["nombre"];
    $tituloAlbum = $_POST["titulo"];
    $adicional = $_POST["adicional"];
    $email = $_POST["email"];
    //Dirección
    $calle = $_POST["calle"];
    $numero = $_POST["numero"];
    $localidad = $_POST["localidad"];
    $provincia = $_POST["provincia"];
    
    $direccion = $calle . ', ' . $numero . ', ' . $localidad . ', ' . $provincia ;

    $telefono = $_POST["telefono"];
    $color = $_POST["color"];
    $cantidad = $_POST["cantidad"];
    $resolucion = $_POST["resolucion"];
    $album = $_POST["album"];
    $fecha = $_POST["fecha"];
    $col_impre = isset($_POST["col_impre"]); //? "Sí" : "No";

    //En un futuro el número de páginas será dinámico
    $paginas = 10;
    $fotos = $paginas * 3;

    $factor1 = 0.1;
    $factor2 = 0.08;
    $factor3 = 0.07;
    $lim1 = 4;
    $lim2 = 7;

    if ($paginas < 5) {
        $tarifa = $paginas * $factor1;
    } elseif ($paginas >= 5 && $paginas <= 11) {
        $tarifa = $lim1 * $factor1 + ($paginas - $lim1) * $factor2;
    } else {
        $tarifa = $lim1 * $factor1 + $lim2 * $factor2 + ($paginas - ($lim2 + $lim1)) * $factor3;
    }

    if(!$col_impre && $resolucion <= 300){
        //Blanco y negro 450-900dpi
        
        $tarifa = $tarifa + $fotos*0.02;
    }
    else if($col_impre && $resolucion <= 300){
        //Color 150-300dpi
        $tarifa = $tarifa + $fotos*0.05;
    }
    else if($col_impre && $resolucion >= 450){
        //Color 450-900dpi
        $tarifa = $tarifa + $fotos*0.02;
        $tarifa = $tarifa + $fotos*0.05;
    }


    $coste = $tarifa . "€";

    $total = ($tarifa * $cantidad) . "€"

?>