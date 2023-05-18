<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números aleatorios</title>
</head>
<body>
    <?php
        session_start();
        
        if (isset($_POST['enviar'])){
            session_unset();
            $_SESSION["nombre"] = $_POST['nombre'];

            $numeros = array();
            $rand = random_int(0, 999999);
            array_push($numeros, $rand);
            $_SESSION['numeros'] = $numeros;
        }

        else if (isset($_POST['borrar']))
            session_unset();

        else{   // reenvio
            if (isset($_SESSION['numeros'])){
                $anterior = $_SESSION['numeros'];

                $rand = random_int(0, 999999);
                array_push($anterior, $rand);
                $_SESSION['numeros'] = $anterior;
            }
        }

        if (isset($_SESSION['nombre'])){
            $nombre = strip_tags($_SESSION['nombre']);
            echo "<p> Bienvenido $nombre </p>";
            echo "<p> El nuevo número es:  $rand </p>";

            $numeros = $_SESSION['numeros'];
            
            echo "<ol>";
            for ($i = 0; $i < sizeof($numeros); $i++){
                echo "<li>";
                echo $numeros[$i];
                echo "</li>";
            }
            echo "</ol>";
        }
    ?>

    <form action="aleatorios.php" method="POST">
        <label> Dígame su nombre para comenzar: </label>
        <input type="text" name="nombre"/>

        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrar" value="Borrar sesion">
    </form>

    <a href="aleatorios.php">Cargar de nuevo</a>
</body>
</html>