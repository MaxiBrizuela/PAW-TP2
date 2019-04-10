<?php

$app->router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/us' => 'controllers/about-us.php',
    'contact' => 'controllers/contact.php',
    'Punto6_Formulario' => 'controllers/punto6_Formulario.php',
    'Punto6_Turnos' => 'controllers/punto6_Turnos.php',
    'Punto6Validado' => 'controllers/punto6.validado.php',
    'ValidarPunto6' => 'controllers/llamaValidarPunto6.php'
]);
