<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= statics('main.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= statics('punto1.css') ?>" rel="stylesheet" type="text/css">
    <script>
        function llamar(){
            require 'VistaDeFichaDeTurno';
            return true;
        }
    </script>
</head>
<body class="body">
    <?php require 'nav.view.php' ?>
    <h1><?= $main_title ?></h1>

    <section class="seccionPrincipal">
        <table>
            <thead>
                <tr>
                    <th scope="col">Fecha del turno</th>
                    <th scope="col">Hora del turno</th>
                    <th scope="col">Nombre de paciente</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Link a la ficha del turno</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(file_exists('turnos/turnos.json')){
                        $turnosDatosActuales = file_get_contents('turnos/turnos.json');
                        $arrayTurnos = json_decode($turnosDatosActuales, true);
                        
                        if($arrayTurnos){//Si no está vacio
                            foreach($arrayTurnos as $turno){
                                ?> 
                                    <tr>
                                        <td><?=$turno['fechaTurno']?></td>
                                        <td><?=$turno['turno']?></td>
                                        <td><?=$turno['nombre']?></td>
                                        <td><?=$turno['telefono']?></td>
                                        <td><?=$turno['email']?></td>
                                        <td><a href="VistaDeFichaDeTurno?id=<?=$turno['id']?>">Link a la ficha del turno</a></td>
                                    </tr>
                                <?php
                            }
                        }
                    }else{
                        array_push($GLOBALS['fallo'],"No existe el archivo turnos.json");
                    }
                ?>
            </tbody>
        </table>
    </section>    
</body>
</html>      