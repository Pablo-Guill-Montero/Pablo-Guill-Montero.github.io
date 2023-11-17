<?php
$usuario1 = "Iker";
$usuario2 = "Pablo";
$usuario3 = "Jaime";
$usuario4 = "Migel";

$contra1 = "Iker123";
$contra2 = "Pablo123";
$contra3 = "Jaime123";
$contra4 = "Miguel123"; 

$estilo1 = "indexNoche";
$estilo2 = "indexAltoContraste";
$estilo3 = "indexLetraMayor";
$estilo4 = "indexLetraContraste";

if (isset($_POST['nombre']) && isset($_POST['pwd'])) {
    $nombre = $_POST['nombre'];
    $pwd = $_POST['pwd'];

    if($nombre=="" || $pwd==""){
        header("Location: ./../login.php?nombre=$nombre&pwd=$pwd");
    } else {
        if ($nombre == $usuario1 && $pwd == $contra1 ||
            $nombre == $usuario2 && $pwd == $contra2 ||
            $nombre == $usuario3 && $pwd == $contra3 ||
            $nombre == $usuario4 && $pwd == $contra4) {
            
                if ($nombre == $usuario1)
                    $estilo = $estilo1;
                else if ($nombre == $usuario2)
                    $estilo = $estilo2;
                else if ($nombre == $usuario3)
                    $estilo = $estilo3;
                else if ($nombre == $usuario4)
                    $estilo = $estilo4;
                
                if(isset($_POST['recuerda'])){
                    $expira = time() + 90 * 24 * 60 *  60;
                    $hoy = time();

                    setcookie(
                        "usuario",
                         $nombre,
                         $expira,
                         '/'
                    );

                    setcookie(
                         "pwd",
                         $pwd,
                         $expira,
                         '/'
                    );

                    setcookie(
                        "ultima",
                        $hoy,
                        $expira,
                         '/'
                    );

                    setcookie(
                        "estilo",
                        $estilo,
                        $expira,
                         '/'
                    );
                }
                session_start();
                $_SESSION['usuario'] = $nombre;
                $_SESSION['pwd'] = $pwd;
                $_SESSION['estilo'] = $estilo;

            header("Location: ./../usuario.php?$nombre");
        } else {
            header("Location: ./../login.php?nombre=$nombre&pwd=$pwd&modo=1");
        }
    }
}
?>