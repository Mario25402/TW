<pre>
    <?php
        // Aficiones
        function print_label_aficiones($valor){
            print ("<label>");

            switch($valor){
                case 0: print(" Los pájaros "); break;
                case 1: print(" Los videojuegos "); break;
                case 2: print(" Coleccionar botones de camisas "); break;
                case 3: print(" Mirar el techo "); break;
                case 4: print(" Programar en ensamblador "); break;
            }

            print("</label>");
        }

        function print_aficiones($aficiones){
            global $relleno;
            global $correcto;

            if ($aficiones == NULL){
                for ($i = 0; $i < 5; $i++){
                    print_input("checkbox", "aficiones[]", null, true, false);
                    print_label_aficiones($i);
                }   

                if ($relleno) print_error_seleccion();
            }

            else if ($correcto){
                if (in_array("pajaros", $aficiones)) print_seleccion("checkbox", "aficiones[]", "pajaros", true, true);
                else print_seleccion("checkbox", "aficiones[]", "pajaros", false, true);
                print_label_aficiones(0);

                if (in_array("videojuegos", $aficiones)) print_seleccion("checkbox", "aficiones[]", "videojuegos", true, true);
                else print_seleccion("checkbox", "aficiones[]", "videojuegos", false, true);
                print_label_aficiones(1);

                if (in_array("botones", $aficiones)) print_seleccion("checkbox", "aficiones[]", "botones", true, true);
                else print_seleccion("checkbox", "aficiones[]", "botones", false, true);
                print_label_aficiones(2);

                if (in_array("techo", $aficiones)) print_seleccion("checkbox", "aficiones[]", "techo", true, true);
                else print_seleccion("checkbox", "aficiones[]", "techo", false, true);
                print_label_aficiones(3);

                if (in_array("ensamblador", $aficiones)) print_seleccion("checkbox", "aficiones[]", "ensamblador", true, true);
                else print_seleccion("checkbox", "aficiones[]", "ensamblador", false, true);
                print_label_aficiones(4);
            }

            else{
                if (in_array("pajaros", $aficiones)) print_seleccion("checkbox", "aficiones[]", "pajaros", true, false);
                else print_seleccion("checkbox", "aficiones[]", "pajaros", false, false);
                print_label_aficiones(0);

                if (in_array("videojuegos", $aficiones)) print_seleccion("checkbox", "aficiones[]", "videojuegos", true, false);
                else print_seleccion("checkbox", "aficiones[]", "videojuegos", false, false);
                print_label_aficiones(1);

                if (in_array("botones", $aficiones)) print_seleccion("checkbox", "aficiones[]", "botones", true, false);
                else print_seleccion("checkbox", "aficiones[]", "botones", false, false);
                print_label_aficiones(2);

                if (in_array("techo", $aficiones)) print_seleccion("checkbox", "aficiones[]", "techo", true, false);
                else print_seleccion("checkbox", "aficiones[]", "techo", false, false);
                print_label_aficiones(3);

                if (in_array("ensamblador", $aficiones)) print_seleccion("checkbox", "aficiones[]", "ensamblador", true, false);
                else print_seleccion("checkbox", "aficiones[]", "ensamblador", false, false);
                print_label_aficiones(4);
            }
        }

        // Edad
        function print_label_edades($valor){
            print ("<label>");

            switch($valor){
                case 0: print(" Menor de 12 años "); break;
                case 1: print(" Entre 12 y 18 años "); break;
                case 2: print(" Mayor de 18 años "); break;
            }

            print("</label>");
        }

        function print_edades($edad){
            global $relleno;
            global $correcto;

            if ($edad == NULL){
                for($i = 0; $i < 3; $i++){
                    print_input("radio", "edad", null, true, false);
                    print_label_edades($i);
                }

                if ($relleno) print_error_seleccion();
            }

            else if ($correcto){
                if ($edad == "menor12"){
                    print_seleccion("radio", "edad", "menor12", true, true);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, true);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, true);
                    print_label_edades(2);
                }
                else if ($edad == "entre12y18"){
                    print_seleccion("radio", "edad", "menor12", false, true);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", true, true);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, true);
                    print_label_edades(2);
                }
                else if ($edad == "mayor18"){
                    print_seleccion("radio", "edad", "menor12", false, true);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, true);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", true, true);
                    print_label_edades(2);
                }
                else {
                    print_seleccion("radio", "edad", "menor12", false, true);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, true);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, true);
                    print_label_edades(2);
                }
            }

            else{
                if ($edad == "menor12"){
                    print_seleccion("radio", "edad", "menor12", true, false);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, false);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, false);
                    print_label_edades(2);
                }
                else if ($edad == "entre12y18"){
                    print_seleccion("radio", "edad", "menor12", false, false);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", true, false);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, false);
                    print_label_edades(2);
                }
                else if ($edad == "mayor18"){
                    print_seleccion("radio", "edad", "menor12", false, false);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, false);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", true, false);
                    print_label_edades(2);
                }
                else {
                    print_seleccion("radio", "edad", "menor12", false, false);
                    print_label_edades(0);

                    print_seleccion("radio", "edad", "entre12y18", false, false);
                    print_label_edades(1);

                    print_seleccion("radio", "edad", "mayor18", false, false);
                    print_label_edades(2);
                }
            }
        }

        // Errores
        function print_error($campo, $is_email){
            print("<label style=\"display:block; color:red; margin: -15px 0 10px ");
            if ($is_email) print("57");
            else print ("78");
            print("px\">El $campo no es correcto</label>");
        }

        function print_error_seleccion(){
            print("<label style=\"display:block; color:red\">Debe marcar algún elemento</label>");
        }

        // General
        function print_input($tipo, $nombre, $valor, $obligatorio, $inactivo){
            print("<input type=$tipo name=$nombre placeholder=\"Introduzca su $nombre\" ");
            if($obligatorio) print("requiered ");
            if ($inactivo) print("disabled ");
            if ($valor != NULL) print ("value=$valor ");
            print("/>");
        }

        function print_seleccion($tipo, $nombre, $valor, $seleccionado, $inactivo){
            print("<input type=$tipo name=$nombre placeholder=\"Introduzca su $nombre\" ");
            if($seleccionado) print("checked ");
            if ($inactivo) print("disabled ");
            print ("value=$valor />");
        }

        function print_campo($error, $tipo, $nombre, $valor){
            global $relleno;
            global $correcto;

            if ($tipo == "radio")
                print_edades($valor);

            else if ($tipo == "checkbox")
                print_aficiones($valor);

            else{
                if ($error){ // Algo mal 
                    print_input($tipo, $nombre, null, true, false);
                    if ($nombre == "email" and $relleno) print_error($nombre, true);
                    else if ($relleno) print_error($nombre, false);
                }

                else if ($correcto) print_input($tipo, $nombre, $valor, false, true); // Correcto
                else print_input($tipo, $nombre, $valor, true, false); // Primera vez y sticky
            }
        }
    ?>

    <?php
        $relleno = ($_POST['enviar'] != NULL);
        $name = strip_tags($_POST['nombre']);

        $email = $_POST['email'];
        $email_check = filter_var($email, FILTER_VALIDATE_EMAIL);

        $patron = "/^\d{9}$/";
        $telefono = $_POST['telefono'];
        $tel_check = preg_match($patron, $telefono);

        $edad = $_POST['edad'];
        $aficiones = $_POST['aficiones'];

        if ($relleno) $correcto = ($name != NULL and $email_check and $tel_check and $edad != NULL and $aficiones != NULL);
    ?>
</pre>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            background-color: darkkhaki;
        }

        h1 {
            margin: 30px 0 30px 5px;
        }

        .Datos {
            margin: 0 0 10px 50px;
        }

        .Datos input {
            display: inline-block;
            margin-bottom: 20px;
        }

        .entrada-email {
            margin-left: 21px;
        }

        .Edad{
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 20px;
        }

        .Aficiones { 
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 20px;
        }

        .text-edad{
            padding: 0 2px 0 2px;
            background-color: darkkhaki;
        }

        .text-aficiones{
            padding: 0 2px 0 2px;
            background-color: darkkhaki;
        }

        .correcto{
            background-color: white;
            padding: 10px;
        }

        .correcto > h1{
            font-size: 40px;
        }
    </style>
</head>

<body>
    <?php
        if ($correcto){
            echo <<<HTML
                <div class="correcto">
                    <h1>Los datos se han recibido correctamente</h1>
                    <p>
                        Hola $name, a continuacion se muestra el formulario con los datos
                        recibidos. Se ha desabilitado la entrada de datos porque se trata unicamente de mostrar información aprovechando el formulario. El botón de envío también se ha desabilitado.
                    </p>
                </div>
            HTML;
        }
    ?>        

    <h1>Formulario:</h1>
    <form action="" method="POST">
        <div class="Datos">
            <div class="entrada-nombre">
                <label for="nombre">Nombre:</label>
                <?php print_campo($name == NULL, "text", "nombre", $name); ?>
            </div>

            <div class="entrada-email">
                <label for="email">Email:</label>
                <?php print_campo(!$email_check, "email", "email", $email); ?>
            </div>

            <div class="entrada-tel">
                <label for="telf">Teléfono:</label>
                <?php print_campo(!$tel_check, "tel", "telefono", $telefono); ?>
            </div>
        </div>

        <fieldset class="Edad">
            <legend class="text-edad">Edad</legend>
            <?php print_campo(null, "radio", null, $edad) ?>
        </fieldset>

        <fieldset class="Aficiones">
            <legend class="text-aficiones">Aficiones</legend>
            <?php print_campo(null, "checkbox", null, $aficiones); ?>
        </fieldset>

        <?php
            if ($correcto) print("<input type=\"submit\" name=\"enviar\" value=\"Enviar datos\" disabled>");
            else print("<input type=\"submit\" name=\"enviar\" value=\"Enviar datos\">");
        ?>
    </form>
</body>

</html>