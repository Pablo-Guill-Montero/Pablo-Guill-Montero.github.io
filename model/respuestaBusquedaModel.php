<?php
    //Procedural
    $id = @mysqli_connect("", "gamescape", "gamescape", "gamescape"); //máquina, usuario, contraseña, db
    if(mysqli_connect_errno() != 0){
        echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
        exit;
    }
    echo "Todo va bien";

    $tituloFoto = $fecha = $pais = $usuario = $album = ""; 
    $cantidad = 5; 
    if(isset($_GET['Titulo']))
        $tituloFoto = $_GET['Titulo'];
    if(isset($_GET['Fecha']))
        $fecha = $_GET['Fecha'];
    if(isset($_GET['Pais']))
        $pais = $_GET['Pais'];
    if(isset($_GET['Usuario']))
        $usuario = $_GET['Usuario'];
    if(isset($_GET['Album']))
        $album = $_GET['Album'];
    if(isset($_GET['Cantidad']))
        $cantidad = $_GET['Cantidad'];

    $res_busq = buscar($id, $tituloFoto, $fecha, $pais, $usuario, $album, $cantidad);

    function buscar($id, $tituloFoto, $fecha, $pais, $usuario, $album, $cantidad){
        $tituloFoto = strtolower($tituloFoto);
        $fecha = strtolower($fecha);
        $pais = strtolower($pais);
        $usuario = strtolower($usuario);
        $album = strtolower($album);
    
        $resultado = mysqli_query($id, 
            "SELECT f.Titulo as Titulo, DATE_FORMAT(Fecha, '%e/%c/%Y') as Fecha, DATE_FORMAT(f.FRegistro, '%e/%c/%Y') as FRegistro, IdFoto, NomUsuario as Usuario, NomPais as Pais, a.Titulo as Album, Fichero, Alternativo
            FROM fotos f, usuarios , album a, paises
            WHERE Usuario = IdUsuario
            AND Album = IdAlbum
            AND f.Pais = IdPais
            AND LOWER(NomUsuario) LIKE '%$usuario%'
            AND LOWER(f.Titulo) LIKE '%$tituloFoto%'
            AND Fecha LIKE '%$fecha%'
            AND LOWER(NomPais) LIKE '%$pais%'
            AND LOWER(a.Titulo) LIKE '%$album%'
            ORDER BY f.FRegistro DESC
            LIMIT $cantidad");
        if(mysqli_connect_errno() != 0){
            echo mysqli_connect_error();//deberíamos guardar el error para el desarrollador
            exit;
        }
        echo "Todo va bien";

        return $resultado;
    }
?>