<?php
$usuario1 = "Iker";
$usuario2 = "Pablo";
$usuario3 = "Jaime";
$usuario4 = "Migel";

$contra1 = "Iker123";
$contra2 = "Pablo123";
$contra3 = "Jaime123";
$contra4 = "Miguel123"; 

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
                        "principal",
                        $expira,
                         '/'
                    );
                }
                session_start();
                $_SESSION['usuario'] = $nombre;
                $_SESSION['pwd'] = $pwd;




            header("Location: ./../usuario.php?$nombre");
        } else {
            header("Location: ./../login.php?nombre=$nombre&pwd=$pwd&modo=1");
        }
    }
}
?>