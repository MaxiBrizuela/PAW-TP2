<?php

$app->router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/us' => 'controllers/about-us.php',
    'contact' => 'controllers/contact.php',
    'Punto3' => 'controllers/punto3.php',
    'Punto3Validado' => 'controllers/punto3.validado.php',
    'ValidarPunto3' => 'controllers/llamaValidarPunto3.php'
]);
