<?php 
    if (isset($_POST['respuesta2'])){
        $resp = $_POST['respuesta2'];
        setcookie('p2', $resp);
    }

    else if (!isset($_COOKIE['p1']) or !isset($_COOKIE['p2']))
        header('Location: pregunta1.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta 3</title>
</head>
<body>
    <p> Las explicaciones de teoría son: </p>

    <form action="pregunta4.php" method="POST">
        <select name="respuesta3">
            <option value="Malas"> Malas </option>
            <option value="Normales"> Normales </option>
            <option value="Buenas"> Buenas </option>
            <option value="NS/NC"> NS/NC </option>
        </select>

        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>