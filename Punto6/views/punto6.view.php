<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= statics('main.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= statics('punto1.css') ?>" rel="stylesheet" type="text/css">
</head>
<body class="body">
    <?php require 'nav.view.php' ?>
    <h1><?= $main_title ?></h1>

    <section class="seccionPrincipal">
        <h2>Cargue sus datos</h2>

        <?php
            if($fallo){
                foreach($fallo as $error){
                    echo "<p class='advertencia'> $error </p>";
                }
            }
        ?>

        <p class="advertencia">Obligatorio*</p>

        <form name="formulario" method="post" action="ValidarPunto6" oninput="valorAltura.value = altura.valueAsNumber" enctype="multipart/form-data">
            <label for="nombre">*Nombre: </label>
            <input type="text" name="nombre" value="<?=$nombre?>" maxlength="50" placeholder="Ingrese nombre y apellido" pattern="[A-Za-z\s]+" title="Solo se admiten letras minúsculas,mayúsculas y espacios" required>

            <label for="email">*E-mail: </label>
            <input type="email" name="email" value="<?=$email?>" placeholder="Ingrese dirección de email" title="Ingrese una dirección de email válida: user@dom.com" required>

            <label for="telefono">*Teléfono: </label>
            <input type="number" name="telefono" min="0" value="<?=$telefono?>" placeholder="Ingrese número de teléfono" pattern="[0-9]+" maxlength="13"  title="Solo se admiten números sin espacios ni guiones" required>

            <label for="edad">Edad: </label>
            <input type="number" name="edad" min="0" value="<?=$edad?>" placeholder="Ingrese su edad">

            <label for="talla">Talla de calzado: </label>
            <input type="number" name="talla" min="20" max="45" value="<?=$talla?>">

            <label for="altura">Altura: </label>
            <input type="range" name="altura" min="0" max="250" value="<?=$altura?>">
            <p class="cm"><output for="altura" name="valorAltura">0</output>cm</p>

            <label for="fechaNacimiento">*Fecha de nacimiento: </label>
            <input type="date" name="fechaNacimiento" value="<?=$fechaNacimiento?>" required>

            <label for="pelo">Color de pelo: </label>
            <select id="1" name="pelo" value="<?=$pelo?>">
                <option value="negro">Negro</option>
                <option value="rubio">Rubio</option>
                <option value="castaño">Castaño</option>
                <option value="colorado">Colorado</option>
                <option value="gris">Gris</option>
                <option value="noTienePelo">No tiene pelo</option>
                <option value="otroColor">Otro color</option>
            </select>

            <label for="fechaTurno">*Fecha del turno: </label>
            <input type="date" name="fechaTurno" value="<?=$fechaTurno?>" required>

            <label for="turno">Horario del turno: </label>
            <input type="time" name="turno" min="08:00:00" max="16:45:00" step="900" value="<?=$turno?>">
            <small>Nuestro horario de atención es de 08:00 AM a 05:00 PM Hs</small>

            <label for="imagen">Diagnóstico</label>
			<input type="file" name="imagen">

            <input class="boton" type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </section>    
</body>
</html>

            
