<?php
    if (isset($_POST['respuesta1'])){
        $resp = $_POST['respuesta1'];
        setcookie('p1', $resp);
    }

    else if (!isset($_COOKIE['p1']))
        header('Location: pregunta1.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta 2</title>
</head>
<body>
    <p> Considera que la profundidad del temario en estos temas es: </p>

    <form action="pregunta3.php" method="POST">
        <select name="respuesta2">
            <option value="Deficiente"> Deficiente </option>
            <option value="Adecuada"> Adecuada </option>
            <option value="Excesiva"> Excesiva </option>
            <option value="NS/NC"> NS/NC </option>
        </select>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>