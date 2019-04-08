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
            if($falloCamposObligatorios)
            {
                ?><p class="advertencia">Falta completar campos obligatorios*</p><?php
            }
            else
            {
                ?><p class="advertencia">Obligatorio*</p><?php
            }

            if($falloEmail)
            {
                ?><p class="advertencia">Fallo el mail</p><?php
            }

            if($falloNombre)
            {
                ?><p class="advertencia">Fallo el nombre</p><?php
            }

            if($falloPelo)
            {
                ?><p class="advertencia">Fallo el color de pelo</p><?php
            }

            if($falloTelefono)
            {
                ?><p class="advertencia">Fallo el telefono</p><?php
            }

            if($falloTalla)
            {
                ?><p class="advertencia">Fallo la talla de calzado</p><?php
            }

            if($falloEdad)
            {
                ?><p class="advertencia">Fallo la edad</p><?php
            }

            if($falloAltura)
            {
                ?><p class="advertencia">Fallo la altura</p><?php
            }

            if($falloTurno)
            {
                ?><p class="advertencia">Fallo el horario del turno</p><?php
            }

            if($falloFechaTurno)
            {
                ?><p class="advertencia">Fallo la fecha del turno</p><?php
            }

            if($falloFechaNacimiento)
            {
                ?><p class="advertencia">Fallo la fecha de nacimiento</p><?php
            }
        ?>

        <form name="formulario" method="post" action="ValidarPunto2" oninput="valorAltura.value = altura.valueAsNumber">
            <label for="nombre">*Nombre: </label>
            <input type="text" name="nombre" value="<?=$nombre?>" required>

            <label for="email">*E-mail: </label>
            <input type="email" name="email" value="<?=$email?>" required>

            <label for="telefono">*Teléfono: </label>
            <input type="number" name="telefono" min="0" value="<?=$telefono?>" required>

            <label for="edad">Edad: </label>
            <input type="number" name="edad" min="0" value="<?=$edad?>">

            <label for="talla">Talla de calzado: </label>
            <input type="number" name="talla" min="20" max="45" value="<?=$talla?>">

            <label for="altura">Altura: </label>
            <input type="range" name="altura" min="0" max="250" value="<?=$altura?>">
            <p class="cm"><output for="altura" name="valorAltura">0</output>cm</p>

            <label for="fechaNacimiento">*Fecha de nacimiento: </label>
            <input type="date" name="fechaNacimiento" value="<?=$fechaNacimiento?>" required>

            <label for="pelo">Color de pelo: </label>
            <select id="1" name="pelo" value="<?=$pelo?>">
                <option value="morocho">Morocho</option>
                <option value="rubio">Rubio</option>
                <option value="castaño">Castaño</option>
                <option value="colorado">Colorado</option>
            </select>

            <label for="fechaTurno">*Fecha del turno: </label>
            <input type="date" name="fechaTurno" value="<?=$fechaTurno?>" required>

            <label for="turno">Horario del turno: </label>
            <input type="time" name="turno" min="08:00:00" max="16:45:00" step="900" value="<?=$turno?>">

            <input class="boton" type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </section>    
</body>
</html>