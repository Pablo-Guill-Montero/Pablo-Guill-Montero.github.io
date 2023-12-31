<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
    <link rel="stylesheet" href="./CSS/index.css" media="screen">

    <?php
        if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            $fic = $_SESSION['fichero'];
            $des = $_SESSION['descripcion'];
        }
        else { 
            $fic = "colores.css";
            $des = "Estilo estándar";
        }
        // echo 'Fichero: '.$fic.'<br>';
        // echo 'Descripción: '.$des.'<br>';

    ?>
    <link rel="stylesheet" href="./CSS/<?=$fic;?>" title="<?=$des;?>">
    
    <link rel="alternate stylesheet" href="./CSS/indexAltoContraste.css" title="Modo Alto Contraste">
    <link rel="alternate stylesheet" href="./CSS/indexNoche.css" title="Modo Noche">
    <link rel="alternate stylesheet" href="./CSS/indexLetraMayor.css" title="Modo Letra Mayor">
    <link rel="alternate stylesheet" href="./CSS/indexLetraContraste.css" title="Modo Letra Mayor y Alto Contraste"> 
    <link rel="alternate stylesheet" href="./CSS/colores.css" title="Modo Principal">

    <link rel="stylesheet" href="./CSS/indexImpresion.css" media="print"> 

    <link rel="stylesheet" href="./CSS/css/fontello.css">
    <script src="./JS/login.js"></script>

    <?php
        if ($titulo == "Solicitar_Album-GameScape")
            echo '<script src="./JS/solicitar_album.js"></script>';
        if ($titulo == "Mis_Datos-GameScape")
            echo '<script src="./JS/fotos.js"></script>';
        if ($titulo == "Registro-GameScape")
            echo '<script src="./JS/fotos.js"></script>';
        if ($titulo == "Añadir_Foto_a_Album-GameScape")
            echo '<script src="./JS/fotos.js"></script>';
        if ($titulo == "Usuario-GameScape"){
            echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
        }
    ?>  
    
</head>