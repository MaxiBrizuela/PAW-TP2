<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    
    <script type="text/javascript">
        function validacionCliente()
        {
            var error="";
            var nombre = document.forms["formulario"]["nombre"].value;
            if( nombre == "" )
            {
                error = " Complete su nombre (*). ";
                document.getElementById( "error" ).innerHTML = error;
                return false;
            }

            var email = document.forms["formulario"]["email"].value;
            if( email == "" || email.indexOf( "@" ) == -1 )
            {
                error = " Complete su email (*) ";
                document.getElementById( "error" ).innerHTML = error;
                return false;
            }

            var telefono = document.forms["formulario"]["telefono"].value;
            if( telefono == "" )
            {
                error = " Complete su telefono (*). ";
                document.getElementById( "error" ).innerHTML = error;
                return false;
            }

            var fechaNacimiento = document.forms["formulario"]["fechaNacimiento"].value;
            if( fechaNacimiento == "" )
            {
                error = " Complete su fecha de nacimiento (*). ";
                document.getElementById( "error" ).innerHTML = error;
                return false;
            }

            var fechaTurno = document.forms["formulario"]["fechaTurno"].value;
            if( fechaTurno == "" )
            {
                error = " Complete la fecha del turno (*). ";
                document.getElementById( "error" ).innerHTML = error;
                return false;
            }

            else
            {
                return true;
            }
        }
    </script>    

</head>
<body>
    
    <section>
        <h2>Cargue sus datos</h2>
        <p>Obligatorio*</p>
        <form name="formulario" method="post" action="ServerSidePunto1.php" oninput="valorAltura.value = altura.valueAsNumber" onsubmit="return validacionCliente();">
            <label for="nombre">*Nombre: </label>
            <input type="text" name="nombre" value="<?=$nombre?>" id="nombre">

            <label for="email">*E-mail: </label>
            <input type="email" name="email" value="<?=$email?>" id="email">

            <label for="telefono">*Teléfono: </label>
            <input type="number" name="telefono" min="0" value="<?=$telefono?>" id="telefono">

            <label for="edad">Edad: </label>
            <input type="number" name="edad" min="0" value="<?=$edad?>">

            <label for="talla">Talla de calzado: </label>
            <input type="number" name="talla" min="20" max="45" value="<?=$talla?>">

            <label for="altura">Altura: </label>
            <input type="range" name="altura" min="0" max="250" value="<?=$altura?>">
            <p><output for="altura" name="valorAltura">0</output>cm</p>

            <label for="fechaNacimiento">*Fecha de nacimiento: </label>
            <input type="date" name="fechaNacimiento" value="<?=$fechaNacimiento?>">

            <label for="pelo">Color de pelo: </label>
            <select name="pelo" value="<?=$pelo?>">
                <option value="morocho">Morocho</option>
                <option value="rubio">Rubio</option>
                <option value="castaño">Castaño</option>
                <option value="colorado">Colorado</option>
            </select>

            <label for="fechaTurno">*Fecha del turno: </label>
            <input type="date" name="fechaTurno" value="<?=$fechaTurno?>">

            <label for="turno">Horario del turno: </label>
            <input type="time" name="turno" min="08:00:00" max="17:00:00" step="900" value="<?=$turno?>">

            <input class="boton" type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar">
        </form>

        <p id="error" ></p>

    </section>

</body>
</html>