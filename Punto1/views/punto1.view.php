<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <link href="<?= statics('main.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= statics('punto1.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <?php require 'nav.view.php' ?>
    <h1><?= $main_title ?></h1>

    <section>
        <h2>Cargue sus datos</h2>
        <p>Obligatorio*</p>
        <form method="post" action="controllers/llamaValidarPunto1.php" oninput="valorAltura.value = altura.valueAsNumber">
            <label for="nombre">*Nombre: </label>
            <input type="text" name="nombre">

            <label for="email">*E-mail: </label>
            <input type="email" name="email">

            <label for="telefono">*Teléfono: </label>
            <input type="number" name="telefono" min="0">

            <label for="edad">Edad: </label>
            <input type="number" name="edad" min="0">

            <label for="talla">Talla de calzado: </label>
            <input type="number" name="talla" min="20" max="45">

            <label for="altura">Altura: </label>
            <input type="range" name="altura" min="0" max="250">
            <p><output for="altura" name="valorAltura">0</output>cm</p>

            <label for="fechaNacimiento">*Fecha de nacimiento: </label>
            <input type="date" name="fechaNacimiento">

            <label for="pelo">Color de pelo: </label>
            <select name="pelo">
                <option value="morocho">Morocho</option>
                <option value="rubio">Rubio</option>
                <option value="castaño">Castaño</option>
                <option value="colorado">Colorado</option>
            </select>

            <label for="fechaTurno">*Fecha del turno: </label>
            <input type="date" name="fechaTurno">

            <label for="turno">Horario del turno: </label>
            <input type="time" name="turno" min="08:00:00" max="17:00:00" step="900">

            <input class="boton" type="submit" value="Enviar" name="Enviar">
            <input type="reset" value="Limpiar">
        </form>
    </section>

</body>
</html>