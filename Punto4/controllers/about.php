<?php

$title = 'Consigna Punto 4';
$main_title = "Consigna punto 4 TP2";
$content = "<b>4. Agregue al formulario un campo que permita adjuntar una imagen, y que la etiqueta del campo sea Diagnóstico.<br/>
El campo debe validar que sea un tipo de imagen valido (.jpg o .png) y será optativo. La imagen debe almacenarse en un subdirectorio<br/>
del proyecto y también debe mostrarse al usuario al mostrar el resumen del turno del ejercicio 2.<br/><br/> 
¿Qué sucede si 2 usuarios cargan imágenes con el mismo nombre de imagen?<br/> 
Si un usario carga un diagnóstico (imagen) con el mismo nombre de otro diagnostico previamente cargado, el  existente en la carpeta<br/>
del servidor será reemplazado por el nuevo.
<br/><br/>
¿Qué mecanismo implementar para evitar que un usuario sobrescriba una imagen con el mismo nombre?</b><br/>
En la resolución se implemento una sentencia IF que pregunta si ya existe un archivo con el mismo nombre en la carpeta que se desea<br/>
copiar el nuevo diagnóstico. De existir un archivo con el mismo nombre se procede a informar el error y volvemos a la vista del<br/>
formulario médico.
<br/><br/>";


require 'views/about.view.php';
