<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    //echo "Todo va bien";

    //$res_busq = buscar($id, $tituloFoto, $fecha, $pais, $usuario, $album, $cantidad);

    function buscar($id, $tituloFoto, $fecha, $pais, $usuario, $album, $cantidad){
        $tituloFoto = strtolower($tituloFoto);
        $fecha = strtolower($fecha);
        $pais = strtolower($pais);
        $usuario = strtolower($usuario);
        $album = strtolower($album);
    
        //Está filtrando por la fecha de registro, no la de la toma de la foto
        //Formato de búsqueda de la fecha 2023-11-28 13:09:39
        $query = "SELECT f.Titulo as Titulo, DATE_FORMAT(Fecha, '%e/%c/%Y') as Fecha, DATE_FORMAT(f.FRegistro, '%e/%c/%Y') as FRegistro, IdFoto, NomUsuario as Usuario, NomPais as Pais, a.Titulo as Album, Fichero, Alternativo, IdUsuario, IdAlbum, f.Descripcion as Descripcion
            FROM fotos f, usuarios , albumes a, paises
            WHERE Usuario = IdUsuario
            AND Album = IdAlbum
            AND f.Pais = IdPais
            AND LOWER(NomUsuario) LIKE '%$usuario%'
            AND LOWER(f.Titulo) LIKE '%$tituloFoto%'
            AND f.FRegistro LIKE '%$fecha%'
            AND LOWER(NomPais) LIKE '%$pais%'
            AND LOWER(a.Titulo) LIKE '%$album%'
            ORDER BY f.FRegistro DESC";

        if ($cantidad != -1) {
            $query .= " LIMIT $cantidad";
        }

        //echo $query;
        $resultado = mysqli_query($id, $query);
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $resultado;
    }

    function getIntervalo($id, $idAlbum){
        //Está comparando las fechas de registro de las fotos, no las de las fotos en sí
        $query = "SELECT MIN(DATE_FORMAT(FRegistro, '%e/%c/%Y')) as FechaMinima, MAX(DATE_FORMAT(FRegistro, '%e/%c/%Y')) as FechaMaxima
            FROM fotos, albumes
            WHERE Album = IdAlbum
            AND IdAlbum = $idAlbum";
        //echo $query;
        $resultado = mysqli_query($id, $query);
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        //echo "Todo va bien";

        return $resultado;
    }
?>