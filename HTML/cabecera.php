<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titulo?></title>
    <link rel="alternate stylesheet" href="./CSS/indexAltoContraste.css" title="Modo Alto Contraste">
    <link rel="alternate stylesheet" href="./CSS/indexNoche.css" title="Modo Noche">
    <link rel="stylesheet" href="./CSS/indexImpresion.css" media="print"> 
    <link rel="alternate stylesheet" href="./CSS/indexLetraMayor.css" title="Modo Letra Mayor">
    <link rel="alternate stylesheet" href="./CSS/indexLetraContraste.css" title="Modo Letra Mayor y Alto Contraste"> 
    <link rel="stylesheet" href="./CSS/index.css" media="screen"> 
    <link rel="stylesheet" href="./CSS/colores.css" title="Modo Principal">

    <link rel="stylesheet" href="./CSS/css/fontello.css">

    
    <!-- < ?php
        if ($titulo == "Solicitar_Album-GameScape")
            echo '<script src="./JS/solicitar_album.js"></script>';
        else if ($titulo == "Login-GameScape")
            echo '<script src="./JS/login.js"></script>';
        else if ($titulo == "Registro-GameScape")
            echo '<script src="./JS/registro.js"></script>';
    ? > -->
    <?php
        if ($titulo == "Solicitar_Album-GameScape")
            echo '<script src="./JS/solicitar_album.js"></script>';
    ?>  
    
</head>