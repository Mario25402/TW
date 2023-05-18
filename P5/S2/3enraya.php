<?php
    session_start();
    function createInput($fila, $columna){
        $color = color($fila, $columna);
        $name = "poner$fila$columna";
        
        echo "<input type=\"image\" src=\"$color\" width=\"50px\"
              formmethod=\"post\" name=\"$name\" ";

        if ($color == "bamarillo.png")
            echo "class=\"libre\"";

        echo "/>";
    }

    function color($fila, $columna){
        $casilla = "poner" . $fila . $columna;
        if (isset($_SESSION['tablero'][$casilla]))
            return $_SESSION['tablero'][$casilla];
        else
            return "bamarillo.png";
    }

    function cambioTurno(){
        $rojo = "brojo.png";
        $azul = "bazul.png";

        if (isset($_SESSION['turno'])) $actual = $_SESSION['turno'];
        else $actual = $rojo;

        if ($actual == $rojo) $actual = $azul;
        else $actual = $rojo;

        $_SESSION['turno'] = $actual;
        return $actual;
    }

    function cambioColor(){
        if (!compruebaVictoria()){
            global $turno;
            $sigue = true;

            for ($i = 0; $i < 3 and $sigue; $i++){
                for ($j = 0; $j < 3 and $sigue; $j++){
                    $casilla = "poner" . $i . $j . "_y";

                    if (isset($_POST[$casilla])){
                        $casilla = "poner" . $i . $j;

                        if (!isset($_SESSION['tablero'][$casilla]))
                        {
                            if (isset($_SESSION['turno'])) 
                                $_SESSION['tablero'][$casilla] = $_SESSION['turno'];
                            else // Primera vez
                                $_SESSION['tablero'][$casilla] = "brojo.png";

                            $turno = cambioTurno();
                        }
                        
                        $sigue = false;
                    }
                }
            }
        }
    }

    function getTurno(){
        if (isset($_SESSION['turno']))
            return $_SESSION['turno'];
        else
            return "brojo.png";
    }

    function compruebaVictoria(){
        if (compruebaDiagonales() or compruebaHorizontales() or
            compruebaVerticales()) return true;
            
        else
            return false;
    }

    function compruebaVerticales(){
        $victoria = false;

        for ($i = 0; $i < 3 and !$victoria; $i++){
            $lft = "poner" . $i . "0";
            $cen = "poner" . $i . "1";
            $rgt = "poner" . $i . "2";

            $victoria = comprueba($lft, $cen, $rgt);
        }

        return $victoria;
    }

    function compruebaHorizontales(){
        $victoria = false;

        for ($j = 0; $j < 3 and !$victoria; $j++){
            $top = "poner" . "0" . $j;
            $cen = "poner" . "1" . $j;
            $bot = "poner" . "2" . $j;

            $victoria = comprueba($top, $cen, $bot);
        }

        return $victoria;
    }

    function compruebaDiagonales(){
        $victoria = false;
        
        $cen = "poner11";
        $lft = "poner20";
        $rgt = "poner02";

        $victoria = comprueba($lft, $cen, $rgt);

        if (!$victoria){
            $lft = "poner00";
            $rgt = "poner22";

            $victoria = comprueba($lft, $cen, $rgt);
        }

        return $victoria;
    }

    function comprueba($one, $two, $three){
        $victoria = false;

        if (isset($_SESSION['tablero'][$one]) and
            isset($_SESSION['tablero'][$two]) and 
            isset($_SESSION['tablero'][$three]))
            {
                if ($_SESSION['tablero'][$one] == $_SESSION['tablero'][$two] and 
                    $_SESSION['tablero'][$two] == $_SESSION['tablero'][$three])
                    $victoria = true; 
            }

        return $victoria;
    }

    function reinicio(){
        if (!compruebaVictoria() and (
            isset($_SESSION['tablero']['poner00']) and
            isset($_SESSION['tablero']['poner01']) and
            isset($_SESSION['tablero']['poner02']) and
            isset($_SESSION['tablero']['poner10']) and
            isset($_SESSION['tablero']['poner11']) and
            isset($_SESSION['tablero']['poner12']) and
            isset($_SESSION['tablero']['poner20']) and
            isset($_SESSION['tablero']['poner21']) and
            isset($_SESSION['tablero']['poner22'])))
            return true;
    }
?>

<?php
    if (isset($_POST['limpiar'])){
        session_unset();
    }

    if (isset($_POST['reinicio']))
        session_unset();

    $turno;
    cambioColor();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>3 en raya</title>
    <style>
        body {
            font-family: helvetica;
        }

        .juego {
            width: 200px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .juego>h1 {
            width: 100%;
            background-color: lightgreen;
            text-align: center;
        }

        .juego>.informacion {
            width: 100%;
            background-color: lightgreen;
        }

        .informacion {
            margin: 5px 0;
            padding: 5px;
        }

        .informacion img {
            vertical-align: middle;
        }

        .informacion p {
            text-align: center;
            margin: auto;
        }

        .libre {
            transition: transform .5s ease-in-out;
        }

        .libre:hover {
            transform: scale(1.5);
            cursor: pointer;
        }

        .ganador {
            animation: anim 0.5s infinite linear alternate;
        }

        @keyframes anim {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.5);
            }
        }
    </style>
</head>

<body>
    <section class="juego">
        <h1>3 en raya</h1>
        <section class="tablero">
            <form method="post" action="3enraya.php">
                <table name="tablero">
                    <tr>
                        <td><?php createInput(0,0); ?></td>
                        <td><?php createInput(0,1); ?></td>
                        <td><?php createInput(0,2); ?></td>
                    </tr>
                    <tr>
                        <td><?php createInput(1,0); ?></td>
                        <td><?php createInput(1,1); ?></td>
                        <td><?php createInput(1,2); ?></td>
                    </tr>
                    <tr>
                        <td><?php createInput(2,0); ?></td>
                        <td><?php createInput(2,1); ?></td>
                        <td><?php createInput(2,2); ?></td>
                    </tr>
                </table>
            </form>
        </section>

        <section class="informacion">
            <p>Turno: <img src="<?php echo getTurno(); ?>" width="25px" /></p>
            <?php
                if (compruebaVictoria()){
                    if (getTurno() == "brojo.png")  $ganador = "bazul.png";
                    else $ganador = "brojo.png";

                    echo "<p>Ganador: <img src=$ganador width=\"25px\"/></p>";
                }
                else if (reinicio()){
                    echo "<p>Empate</p>";
                }
            ?>
        </section>

        <section class="botones">
            <form method="post" action="3enraya.php">
                <input type="submit" name="limpiar" value="Limpiar" />
            </form>
        </section>
    </section>
</body>

</html>