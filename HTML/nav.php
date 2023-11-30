<body>
    <header>
        <span>
            <a href="./index.php"><img src="./imgenes/logo.png" alt="logo"></a>
            <a href="./index.php"><span>GameScape</span></a>
        </span>  
        <nav>
            <label for="chkmenu">  <!--Para ocultar y sacar el menúdesplegable-->
                &equiv;
            </label>
            <input type="checkbox" id="chkmenu" name="chkmenu">
            <ul id="menu">
                <li><a class="icon-inicio" href="./index.php"><span>INICIO</span></a></li>
                <li><a class="icon-buscar" href="./buscar.php"><span>BUSCAR</span></a></li>
                <?php
                    if (isset($_SESSION["usuario"])){
                        $usu = $_SESSION["usuario"];
                        echo <<<hereDOC
                            <li><a class="icon-nuevaImagen" href="./anadir_foto_album.php"><span>NUEVA IMAGEN</span></a></li>
                            <li><a class="icon-nuevoAlbum" href="./nuevo_album.php"><span>NUEVO ÁLBUM</span></a></li>
                            <li><a class="icon-editarPerfil" href="./usuario.php"><span>$usu</span></a></li>
                            <li><a class="icon-login" id="logout" href="./logout.php"><span>SALIR</span></a></li>
                        hereDOC;
                    }else{
                        echo <<<hereDOC
                            <li><a class="icon-login" id="login" href="./login.php"><span>LOGIN</span></a></li>
                            <li><a class="icon-registro" id="registro" href="./registro.php"><span>REGISTRO</span></a></li>
                        hereDOC;
                    }
                ?>

                
                
            </ul>
        </nav>
    </header>