<?php
    echo <<<hereDOC
        <table>
            <tr class="cabecera">
                <td></td>
                <td></td>
                <td colspan="2">Blanco y negro</td>
                <td colspan="2">Color</td>
            </tr>
            <tr class="cabecera">
                <td>Número de páginas</td>
                <td>Número de fotos</td>
                <td>150-300 dpi</td>
                <td>450-900 dpi</td>
                <td>150-300 dpi</td>
                <td>450-900 dpi</td>
            </tr>
    hereDOC;
        $factor1 = 0.1;
        $factor2 = 0.08;
        $factor3 = 0.07;
        $lim1 = 4;
        $lim2 = 7;

        for ($i = 0; $i < 15; $i++) {
            $paginas = $i + 1;
            $fotos = $paginas * 3;

            echo <<<hereDOC
                <tr>
                    <td>$paginas</td>
                    <td>$fotos</td>
            hereDOC;

            for ($j = 0; $j < 4; $j++) {
                if ($paginas < 5) {
                    $tarifa = $paginas * $factor1;
                } elseif ($paginas >= 5 && $paginas <= 11) {
                    $tarifa = $lim1 * $factor1 + ($paginas - $lim1) * $factor2;
                } else {
                    $tarifa = $lim1 * $factor1 + $lim2 * $factor2 + ($paginas - ($lim2 + $lim1)) * $factor3;
                }

                if($j == 1){
                    //Blanco y negro 450-900dpi
                    $tarifa = $tarifa + $fotos*0.02;
                }
                else if($j == 2){
                    //Color 150-300dpi
                    $tarifa = $tarifa + $fotos*0.05;
                }
                else if($j == 3){
                    //Color 450-900dpi
                    $tarifa = $tarifa + $fotos*0.02;
                    $tarifa = $tarifa + $fotos*0.05;
                }

                echo "<td>" . number_format($tarifa, 2) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
?>