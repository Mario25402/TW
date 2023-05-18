<?php
    if (isset($_POST['respuesta4'])){
        $resp = $_POST['respuesta4'];
        setcookie('p4', $resp);
    }

    else if (!isset($_COOKIE['p1']) or !isset($_COOKIE['p2']) or
        !isset($_COOKIE['p3']) or !isset($_COOKIE['p4']))
        header('Location: pregunta1.php');  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta 4</title>
</head>
<body>
    <p> El sistema de evaluación es: </p>

    <form action="resultado.php" method="POST">
        <select name="respuesta5">
            <option value="Inadecuado"> Inadecuado </option>
            <option value="Buena"> Buena </option>
            <option value="NS/NC"> NS/NC </option>
        </select>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>