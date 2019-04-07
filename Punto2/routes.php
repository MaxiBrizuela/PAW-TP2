<?php

$app->router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/us' => 'controllers/about-us.php',
    'contact' => 'controllers/contact.php',
    'Punto2' => 'controllers/punto2.php',
    'Punto2Validado' => 'controllers/punto2.validado.php',
    'ValidarPunto2' => 'controllers/llamaValidarPunto2.php'
]);
