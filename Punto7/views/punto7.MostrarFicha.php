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
        <h2>Datos validados. Todo correcto!</h2>
        <?php
            if(file_exists('turnos/turnos.json')){
                $turnosDatosActuales = file_get_contents('turnos/turnos.json');
                $arrayTurnos = json_decode($turnosDatosActuales, true);
                
                if($arrayTurnos){//Si no está vacio
                    $id = $_GET['id'];
                    $turno = $arrayTurnos[$id];
                    foreach($turno as $key => $value) {
                        if($key <> 'imagen'){
                            $value = htmlspecialchars($turno[$key]);
                                echo "<p>".$key.' = '.$value."</p>";	
                        }else{
                            $foto = $turno['imagen'];
                            echo "<img src='diagnosticos/$foto' alt='Imagen'>";    
                        }
                    }
                }
            }else{
                array_push($GLOBALS['fallo'],"No existe el archivo turnos.json");
            }
        ?>

    </section>
</body>
</html>