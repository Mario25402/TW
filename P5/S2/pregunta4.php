<?php 
    if (isset($_POST['respuesta3'])){
        $resp = $_POST['respuesta3'];
        setcookie('p3', $resp);
    }

    else if (!isset($_COOKIE['p1']) or !isset($_COOKIE['p2']) or
             !isset($_COOKIE['p3'])) header('Location: pregunta1.php');
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
    <p> La coordinación entre teoría y prácticas es: </p>

    <form action="pregunta5.php" method="POST">
        <select name="respuesta4">
            <option value="Mala"> Mala </option>
            <option value="Buena"> Buena </option>
            <option value="NS/NC"> NS/NC </option>
        </select>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>