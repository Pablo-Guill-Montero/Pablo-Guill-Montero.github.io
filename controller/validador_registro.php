<body style="background-color: #0093E6;"> 
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $fecha = $_POST["fecha"];
    $ciudad = $_POST["ciudad"];
    $pais = $_POST["Pais"];
    $foto = $_POST["foto"];

    validar($pwd, $nombre, $pwd2, $email, $sexo, $fecha, $ciudad, $pais, $foto);
}

function validar($pwd, $nombre, $pwd2, $email, $sexo, $fecha, $ciudad, $pais, $foto) {
    $dialogo = '';
    $html = '';

    if ($nombre == null || cadenaEspacios($nombre) || strlen($nombre) < 3 || strlen($nombre) > 15 || empiezaNumero($nombre) || !caracteresNombre($nombre)) {
        $dialogo = '<dialog>';
        $html .= '<h3>El formato del nombre es incorrecto</h3>';
        $html .= '<p>El nombre solo puede tener letras del alfabeto inglés.</p><p>Además no puede empezar por un número y tiene que tener entre 3 y 15 caracteres</p>';
        if(isset($_SESSION["IdUsuario"])){
            $html .= '<a href="./../misDatos.php">Cerrar</a>';
        }
        else{
            $html .= '<a href="./../registro.php">Cerrar</a>';
        }
        
    } elseif ($pwd == null || cadenaEspacios($pwd) || strlen($pwd) < 6 || strlen($pwd) > 15 || !caracteresPwd($pwd) || !conMayuscula($pwd) || !conMinuscula($pwd) || !conNumero($pwd)) {
        $dialogo = '<dialog>';
        $html .= '<h3>El formato de la contraseña es incorrecto</h3>';
        $html .= '<p>La contraseña solo puede contener letras del alfabeto inglés, números, el guión y el guión bajo.</p><p>Y debe de tener entre 6 y 15 caracteres, un número, una letra en minúscula y una letra en mayúscula</p>';
        if(isset($_SESSION["IdUsuario"])){
            $html .= '<a href="./../misDatos.php">Cerrar</a>';
        }
        else{
            $html .= '<a href="./../registro.php">Cerrar</a>';
        }
    } elseif ($pwd2 != $pwd) {
        $dialogo = '<dialog >';
        $html .= '<h3>El formato de la contraseña es incorrecto</h3>';
        $html .= '<p>Las contraseñas deben ser iguales</p>';
        if(isset($_SESSION["IdUsuario"])){
            $html .= '<a href="./../misDatos.php">Cerrar</a>';
        }
        else{
            $html .= '<a href="./../registro.php">Cerrar</a>';
        }
    } elseif ($email == null || strlen($email) > 254 || !emailCorrecto($email)) {
        $dialogo = '<dialog>';
        $html .= '<h3>El formato del email es incorrecto</h3>';
        $html .= '<p>La estructura del email debe ser: parteLocal@dominio.subdominio1. [...] .subdominioN</p><p>Además debe cumplir con las restricciones de email estándar</p>';
        if(isset($_SESSION["IdUsuario"])){
            $html .= '<a href="./../misDatos.php">Cerrar</a>';
        }
        else{
            $html .= '<a href="./../registro.php">Cerrar</a>';
        }
    } elseif ($fecha == null || !fechaValida($fecha)) {
        $dialogo = '<dialog>';
        $html .= '<h3>El formato de la fecha de nacimiento es incorrecto o eres menor de 18 años</h3>';
        $html .= '<p>Por favor, introduce una fecha de nacimiento válida y asegúrate de que tienes al menos 18 años.</p>';
        if(isset($_SESSION["IdUsuario"])){
            $html .= '<a href="./../misDatos.php">Cerrar</a>';
        }
        else{
            $html .= '<a href="./../registro.php">Cerrar</a>';
        }
    } else {
        // Aquí deberías manejar el envío del formulario en PHP
        // Puedes redirigir a otra página o realizar otras acciones necesarias
        // Ejemplo: header("Location: formulario_enviado.php");

        // OJO AQUÍ SERÍA UN UPDATE O UN INSERT
        // LAS REDIRECCIONES DEBERÍAN ESTAR EN EL MODEL
        //en minúsculas
        $sexo = strtolower($sexo);
        if($sexo == "hombre" || $sexo == "h"){
            $sexo = 1;
        }
        else if($sexo == "mujer" || $sexo == "m"){
            $sexo = 0;
        }
        else{
            $sexo = 2;
        }
        include "./../model/usuarioModel.php";
        if(isset($_SESSION["IdUsuario"])){
            updateUsuario($id, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto);
        }
        else{
            postUsuario($id, $nombre, $pwd, $email, $sexo, $fecha, $ciudad, $pais, $foto);
        }
    }

    if ($dialogo != '') {
        $dialogo .= $html;
        $dialogo .= '</dialog>';

        echo $dialogo;
        echo '<script>document.querySelector("dialog").showModal();</script>';
    }
}

function cadenaEspacios($cadena) {
    return trim($cadena) === "";
}

function caracteresNombre($cadena) {
    return preg_match('/^[a-zA-Z0-9]+$/', $cadena);
}

function caracteresPwd($cadena) {
    return preg_match('/^[a-zA-Z0-9-_]+$/', $cadena);
}

function conMayuscula($cadena) {
    return preg_match('/[A-Z]/', $cadena);
}

function conMinuscula($cadena) {
    return preg_match('/[a-z]/', $cadena);
}

function conNumero($cadena) {
    return preg_match('/[0-9]/', $cadena);
}

function empiezaNumero($cadena) {
    return preg_match('/^\d/', $cadena);
}

function empiezaTerminaGuion($cadena) {
    return preg_match('/^-$|^-/', $cadena);
}

function empiezaTerminaPunto($cadena) {
    return preg_match('/^\.|\.$/', $cadena);
}

function puntosSeguidos($cadena) {
    return preg_match('/\.\./', $cadena);
}

function parteLocalCorrecta($cadena) {
    return preg_match('/^[a-zA-Z0-9!#$%&\'*+\-\/=?^_`{|}~.]+$/', $cadena);
}

function parteDominioCorrecta($cadena) {
    $buenFormato = true;
    $subdominios = explode('.', $cadena);
    foreach ($subdominios as $subdominio) {
        $buenFormato = preg_match('/^[a-zA-Z0-9-]+$/', $subdominio);
        if (strlen($subdominio) > 63 || !$buenFormato || empiezaTerminaGuion($subdominio)) {
            return false;
        }
    }
    return true;
}

function emailCorrecto($cadena) {
    if (strpos($cadena, "@") !== false) {
        $partes = explode('@', $cadena);
        if (strlen($partes[0]) < 1 || strlen($partes[0]) > 64 ||
            strlen($partes[1]) < 1 || strlen($partes[1]) > 255 ||
            !parteLocalCorrecta($partes[0]) ||
            empiezaTerminaPunto($partes[0]) ||
            puntosSeguidos($partes[0]) ||
            !parteDominioCorrecta($partes[1])) {
            return false;
        }
    } else {
        return false;
    }
    return true;
}

function fechaValida($fechaNacimiento) {
    // Comprobar si la fecha de nacimiento es una fecha válida
    $fecha = DateTime::createFromFormat('Y-m-d', $fechaNacimiento);
    $erroresFecha = DateTime::getLastErrors();
    if ($erroresFecha['warning_count'] + $erroresFecha['error_count'] > 0) {
        return false;
    }

    // Comprobar si la persona tiene al menos 18 años
    $hoy = new DateTime();
    if ($fecha instanceof DateTime) {
        $edad = $hoy->diff($fecha)->y;
        return $edad >= 18;
    } else {
        return false;
    }
}

?>
</body>