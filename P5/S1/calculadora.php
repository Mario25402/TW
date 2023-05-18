<?php
    if (isset($_GET['numero1']) and is_numeric($_GET['numero1']))
        $a = $_GET['numero1'];
    else $a = NULL;
    
    if (isset($_GET['numero2']) and is_numeric($_GET['numero2']))
        $b = $_GET['numero2'];
    else $b = NULL;

    $operacion = NULL;
    if (isset($_GET['suma'])) $operacion = "Suma";
    else if (isset($_GET['resta'])) $operacion = "Resta";
    else if (isset($_GET['producto'])) $operacion = "Multiplicación";
    else if (isset($_GET['division'])) $operacion = "División";
?>

<?php
    function correcto($operacion, $a, $b){
        $resultado = null;

        if ($a != NULL and $b != NULL){
            if ($operacion == "Suma") $resultado = $a + $b;
            else if ($operacion == "Resta") $resultado = $a - $b;
            else if ($operacion == "Multiplicación") $resultado = $a * $b;
            else if ($operacion == "División") $resultado = $a / $b;
        }

        echo <<<HTML
        <p>Operación: <span>$operacion</span></p>
        <p>Resultado: <span> $resultado </span></p>
        HTML;
    }

    function primer_dato(){
        echo <<<HTML
        <p style="color:red"> ERROR: El primer dato no es válido</p>
        HTML;
    }

    function segundo_dato(){
        echo <<<HTML
        <p style="color:red"> ERROR: El segundo dato no es válido</p>
        HTML;
    }

    function division_cero(){
        echo <<<HTML
        <p style="color:red"> ERROR: Division por cero</p>
        HTML;
    }

    function vacio(){
        echo <<<HTML
        <p>Operación:</p>
        <p>Resultado:</p>
        HTML;
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <style>
        main {
            font-family: Arial;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form {
            border: 2px solid lightgray;
            padding: 5px;
            display: inline-flex;
            align-items: center;
            background-color: lightblue;
        }

        fieldset {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px;
            display: flex;
            flex-direction: column;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <main>
        <h1>Calculadora</h1>
        <form action="" method="GET">
            <label><span>Dato 1</span><input type="text" name="numero1" placeholder="Introduce un número" /></label>
            <fieldset>
                <legend>Operación</legend>
                <input type="submit" name="suma" value="+">
                <input type="submit" name="resta" value="-">
                <input type="submit" name="producto" value="*">
                <input type="submit" name="division" value="/">
            </fieldset>
            <label><span>Dato 2</span><input type="text" name="numero2" placeholder="Introduce un número" /></label>
        </form>
        <section>
            <?php
            if ($_SERVER['QUERY_STRING']){
                if ($a == NULL and $b == NULL){
                    primer_dato();
                    segundo_dato();
                }
                else if ($a == NULL) primer_dato();
                else if ($b == NULL) segundo_dato();
                else if ($operacion == "División" and $b == 0) division_cero();
                else correcto($operacion, $a, $b) ;
            }
            ?>
        </section>
    </main>
</body>

</html>