<?php 
    if (isset($_POST['respuesta5'])){
        $resp = $_POST['respuesta5'];
        setcookie('p5', $resp);
        header('Location: resultado.php');
    }

    else if (!isset($_COOKIE['p1']) and !isset($_COOKIE['p2']) and
            !isset($_COOKIE['p3']) and !isset($_COOKIE['p4']) and
            !isset($_COOKIE['p5']))
            header('Location: pregunta1.php'); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <style>
        body{
           background-color: #00272b;
           color: #e0ff4f;
        }

        .repuesta{
            border: 1px solid #e0ff4f ;
            border-radius: 10px;
            padding: 10px;
            margin: 0 20px 15px 20px;
        }
    </style>
</head>
<body>
    <p> Resultados de las encuestas: </p>

    <section class="repuesta">
        <label> ¿Tenía conocimientos previos de la materia explicada? </label>
        <label> <?php echo $_COOKIE['p1']; ?> </label>
    </section>
    
    <section class="repuesta">
        <label> Considera que la profundidad del temario en estos temas es: </label>
        <label> <?php echo "\n" . $_COOKIE['p2']; ?> </label>
    </section>
    
    <section class="repuesta">
        <label> Las explicaciones de teoría son: </label>
        <label> <?php echo $_COOKIE['p3']; ?> </label>
    </section>
    
    <section class="repuesta">
        <label> La coordinación entre teoría y prácticas es: </label>
        <label> <?php echo $_COOKIE['p4']; ?> </label>
    </section>
    
    <section class="repuesta">
        <label> El sistema de evaluación es: </label>
        <label> <?php echo $_COOKIE['p5']; ?> </label>
    </section>
</body>
</html>