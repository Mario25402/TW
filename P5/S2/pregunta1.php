<?php
    function borrar_cookies(){
        if (isset($_COOKIE['p1'])) setcookie('p1', '', time() - 3600);
        if (isset($_COOKIE['p2'])) setcookie('p2', '', time() - 3600);
        if (isset($_COOKIE['p3'])) setcookie('p3', '', time() - 3600);
        if (isset($_COOKIE['p4'])) setcookie('p4', '', time() - 3600);
        if (isset($_COOKIE['p5'])) setcookie('p5', '', time() - 3600);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta 1</title>
</head>
<body>
    <?php borrar_cookies(); ?>

    <p> ¿Tenía conocimientos previos de la materia explicada? </p>

    <form action="pregunta2.php" method="POST">
        <select name="respuesta1">
            <option value="Si"> Sí </option>
            <option value="No"> No </option>
            <option value="NS/NC"> NS/NC </option>
        </select>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>