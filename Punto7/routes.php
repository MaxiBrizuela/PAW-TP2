<?php

$app->router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/us' => 'controllers/about-us.php',
    'contact' => 'controllers/contact.php',
    'Punto7_Formulario' => 'controllers/punto7_Formulario.php',
    'Punto7_Turnos' => 'controllers/punto7_Turnos.php',
    'Punto7Validado' => 'controllers/punto7.validado.php',
    'ValidarPunto7' => 'controllers/llamaValidarPunto7.php',
    'VistaDeFichaDeTurno' => 'controllers/llamaMostrarFicha.php',
]);
