<?php
    $nombre = "";
    $pwd = "";
    //session_start();

    if(isset($_COOKIE['usuario']) && isset($_COOKIE['pwd']) && isset($_COOKIE['ultima'])){
        //te estamos recordando
        $nombre =  $_COOKIE['usuario'];
        $pwd =  $_COOKIE['pwd'];
        if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
            // Ya estas iniciado y te recordamos


        }
        else{
            //te recordamos pero no estas iniciado 
            
            $_SESSION['usuario'] = $nombre;
            $_SESSION['pwd'] = $pwd;

            $fecha = $_COOKIE['ultima'];
                setcookie('ultima', time(), time()+ 90 * 24 * 60 *  60, '/');
            echo '<script>';
            echo 'regreso("' . $nombre . '", "' . date('Y-m-d', $fecha) . '", "' . date('H:i', $fecha) . '", "' . "accesibilidad" . '");';
            echo '</script>';

            $_COOKIE['ultima'] = time();
        // header("Location: ./usuario.php?$nombre");

            
        }
    }
    else if(isset($_SESSION['usuario']) && isset($_SESSION['pwd'])){
        // Ya estas iniciado
        $nombre =  $_SESSION['usuario'];
        $pwd =  $_SESSION['pwd'];

    }
?>  
    <main>
        <h1>Accesibilidad</h1>
        <section class="aviso" id="declaracion">
            <h2>Declaración de accesibilidad para <span class="basic-information website-name">GameScape</span></h2>
            <p>
                Esta es una declaración de accesibilidad de <span class="basic-information organization-name">GameScape</span>.
            </p>
            <h3>Estado de conformidad</h3>
            <p>
                Las <a href="https://www.w3.org/WAI/standards-guidelines/wcag/">Directrices de Accesibilidad para el Contenido Web (WCAG)</a> define requisitos para diseñadores y desarrolladores con el fin de mejorar la accesibilidad para personas con discapacidades. Define tres niveles de conformidad: Nivel A, Nivel AA y Nivel AAA.
                <span class="basic-information website-name">GameScape</span>
                es
                <span class="basic-information conformance-status" data-printfilter="lowercase">parcialmente conforme</span>
                con
                <span class="basic-information conformance-standard"><span data-negate="">WCAG 2.1 nivel AA</span>.</span>
                <span>
                <span class="basic-information conformance-status">Parcialmente conforme</span>
                significa que
                <span class="basic-information conformance-meaning">algunas partes del contenido no cumplen completamente con el estándar de accesibilidad</span>.
            </span>
            </p>
            <h4>Consideraciones adicionales de accesibilidad</h4>
            <p class="basic-information conformance-additions">Hemos alcanzado el nivel AAA en algunas de las páginas</p>
            <hr noshade="noshade">
            <h3>Fecha</h3>
            <p>
                Esta declaración fue creada el
                <span class="basic-information statement-created-date">1 de noviembre de 2023</span>
                utilizando la <a href="https://www.w3.org/WAI/planning/statements/">Herramienta Generadora de Declaraciones de Accesibilidad del W3C</a>.
            </p>
        </section>    
    </main>
