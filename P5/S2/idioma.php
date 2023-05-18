<pre>
    <?php
        if (isset($_POST['lang'])) $seleccionado = $_POST['lang'];
        else if (isset($_COOKIE['language_selected'])) $seleccionado = $_COOKIE['language_selected'];
        else $seleccionado = "es";
        
        $mensajes = json_decode(file_get_contents('mensajes.json'), true);

        $elegir = $mensajes[$seleccionado]['ElegirIdioma'];
        $bienvenida = $mensajes[$seleccionado]['Bienvenida'];
        $cambio = $mensajes[$seleccionado]['Cambio'];
        $aplicar = $mensajes[$seleccionado]['Aplicar'];
        $enlace = $mensajes[$seleccionado]['Enlace'];

        setcookie('language_selected', $seleccionado);
    ?>
</pre>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idioma</title>
    <style>
        fieldset{
            padding-bottom: 0;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <p> <?php print $bienvenida; ?> </p>
    <p> <?php print $cambio; ?> </p>

    <fieldset>
        <legend> <?php print $elegir; ?> </legend>

        <form action="" method="POST">
            <select name="lang">
                <option value="es"> Español </option>
                <option value="en"> English</option>
                <option value="fr"> French</option>
            </select>
        
            <input type="submit" name="changes" value= <?php print ("\"$aplicar\""); ?> >
        </form>
    </fieldset>
    
    <a href="./idioma.php"> <?php print $enlace; ?> </a>
</body>
</html>