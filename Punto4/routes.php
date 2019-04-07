<?php

$app->router->define([
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'about/us' => 'controllers/about-us.php',
    'contact' => 'controllers/contact.php',
    'Punto4' => 'controllers/punto4.php',
    'Punto4Validado' => 'controllers/punto4.validado.php',
    'ValidarPunto4' => 'controllers/llamaValidarPunto4.php'
]);
